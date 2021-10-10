<?php
/**
 *  @package ShopCPT
 */

namespace Inc\API;

class SettingsApi {
    
    public $admin_pages = array();
    public $admin_subpages = array();


    public function register()
    {
        if(!empty($this->admin_pages)){
            add_action('admin_menu',array($this,'addAdminMenu'));
        }
    }

    public function addPages( array $pages )
    {
        $this->admin_pages = $pages;

        return $this;
    }

    public function withSubPage(string $title = null){

        if( empty($this->admin_pages)){
            return $this;
        }

        $admin_page  = $this->admin_pages[0];
        $subpage = array(
            array(
                'parent_slug' => $admin_pages['menu_slug'],
                'page_title' =>$admin_pages['page_title'],  
                'menu_title' => $admin_pages['menu_title'],
                'capability' => $admin_pages['capability'],
                'menu_slug'=> $admin_pages['menu_slug'],
                'callback'=> $admin_pages['callback'],
             )
            );
            $this->admin_subpage = $subpage;
            return $this;
    }

     public function addAdminMenu(){

         foreach ( $this->admin_pages as $page){
             
            add_menu_page( $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position'] );
         }

         foreach ( $this->admin_subpages as $page){
             
            add_submenu_page( $page['parent_title'],$page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'] );
         }
     }
}