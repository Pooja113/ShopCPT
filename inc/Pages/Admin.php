<?php
/**
 *  @package ShopCPT
 */
namespace Inc\Pages;


use \Inc\API\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\API\CallBacks\AdminCallBacks;


 class Admin extends BaseController
 {
    public $settings;

    public $callbacks;

    public $pages=array();
    
    public $subpages=array();

    public function register(){
      $this->settings = new SettingsApi();

      $this->callbacks = new AdminCallBacks();

      $this->setPages();

      $this->setSubPages();

      $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages(){
      $this->pages = array(
        array(
           'page_title' =>'Shop Admin',
           'menu_title' => 'Shop Admin',
           'capability' => 'manage_options',
           'menu_slug'=> 'shop_cpt',
           'callback'=> array( $this->callbacks, 'adminDashboard'),
           'icon_url' =>'dashicons-edit-page',
           'position' => '110'
        ) 
        );
    }

    public function setSubPages(){
      $this->subpages = array(
        array(
          'parent_slug' => 'shop_cpt',
           'page_title' =>'CPT Manager',
           'menu_title' => 'Manager',
           'capability' => 'manage_options',
           'menu_slug'=> 'cpt_manager',
           'callback'=> array( $this->callbacks, 'cptManager'),
        ),
        array(
          'parent_slug' => 'shop_cpt',
           'page_title' =>'CPT Taxonomies',
           'menu_title' => 'Taxonomies',
           'capability' => 'manage_options',
           'menu_slug'=> 'cpt_taxonomoies',
           'callback'=> array( $this->callbacks, 'cptTaxonomies'),
        ),
        array(
          'parent_slug' => 'shop_cpt',
           'page_title' =>'CPT Widgets',
           'menu_title' => 'Widgets',
           'capability' => 'manage_options',
           'menu_slug'=> 'cpt_widgets',
           'callback'=> array( $this->callbacks, 'cptWidgets'),
        )
        ); 
    }
 }
