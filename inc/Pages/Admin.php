<?php
/**
 *  @package ShopCPT
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\API\SettingsApi;

 class Admin extends BaseController
 {
    public $settings;
    public $pages=array();
    public $subpages=array();


    public function __construct(){
      $this->settings = new SettingsApi();
      $this->pages = array(
        array(
           'page_title' =>'Shop Admin',
           'menu_title' => 'Shop Admin',
           'capability' => 'manage_options',
           'menu_slug'=> 'shop_cpt',
           'callback'=> function(){echo '<h1>Shop Admin !!</h1>';},
           'icon_url' =>'dashicons-edit-page',
           'position' => '110'
        ) 
        );
        $this->subpages = array(
          array(
            'parent_slug' => 'shop_cpt',
             'page_title' =>'CPT Manager',
             'menu_title' => 'Manager',
             'capability' => 'manage_options',
             'menu_slug'=> 'cpt_manager',
             'callback'=> function(){echo '<h1>CPT Manager !!</h1>';},
          ),
          array(
            'parent_slug' => 'shop_cpt',
             'page_title' =>'CPT Taxonomies',
             'menu_title' => 'Taxonomies',
             'capability' => 'manage_options',
             'menu_slug'=> 'cpt_taxonomoies',
             'callback'=> function(){echo '<h1>CPT Toxonomy !!</h1>';},
          ),
          array(
            'parent_slug' => 'shop_cpt',
             'page_title' =>'CPT Widgets',
             'menu_title' => 'Widgets',
             'capability' => 'manage_options',
             'menu_slug'=> 'cpt_widgets',
             'callback'=> function(){echo '<h1>CPT Widgets !!</h1>';},
          )
          );  
    }

    public function register(){
     
      //add_action('admin_menu', array($this,'add_admin_pages')); 
      $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

  //   public function add_admin_pages(){
  //     add_menu_page('Shop Admin','Shop Admin','manage_options','shop_cpt',array($this,'admin_index'),'dashicons-edit-page',110); 
  //  }
      
  //  public function admin_index(){
  //     require_once $this->plugin_path . 'templates/admin.php';
  //  }
 }
