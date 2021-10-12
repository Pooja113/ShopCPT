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

      $this->setSettings();
      $this->setSections();
      $this->setFields();

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

    public function setSettings(){
      $args = array(
        array(
         'option_group'  => 'shop_cpt_group',
         'option_name'  => 'text_example',
         'callback'  => array($this->callbacks, 'cptOptionGroup') ,
        ),
        array(
          'option_group'  => 'shop_cpt_group',
          'option_name'  => 'first_name'
         )
      );
      $this->settings->setSettings( $args );
    }

    public function setSections(){
      $args = array(
        array(
         'id'  => 'cpt_admin_index',
         'title'  => 'Settings',
         'callback'  => array($this->callbacks, 'cptAdminSection') ,
         'page'  => 'shop_cpt',
        )
      );
      $this->settings->setSections( $args );
    }

    public function setFields(){
      $args = array(
        array(
         'id'  => 'text_example',
         'title'  => 'Text',
         'callback'  => array($this->callbacks, 'cptAdminFields') ,
         'page'  => 'shop_cpt',
         'section'  => 'cpt_admin_index',
         'args' => array(
           'label_for' => 'text_example',
           'class' => 'example-class' 
         )
         ),
         array(
          'id'  => 'first_name',
          'title'  => 'First Name',
          'callback'  => array($this->callbacks, 'cptFirstName') ,
          'page'  => 'shop_cpt',
          'section'  => 'cpt_admin_index',
          'args' => array(
            'label_for' => 'first_name',
            'class' => 'example-class' 
          )
          )
      );
      $this->settings->setFields( $args );
    }
 }
