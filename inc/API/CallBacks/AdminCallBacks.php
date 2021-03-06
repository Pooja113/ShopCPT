<?php
/**
 *  @package ShopCPT
 */

namespace Inc\API\CallBacks;


use Inc\Base\BaseController;

class AdminCallBacks extends BaseController
{

    public function adminDashboard(){
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function cptManager(){
        return require_once("$this->plugin_path/templates/manager.php");
    }

    public function cptTaxonomies(){
        return require_once("$this->plugin_path/templates/taxonomy.php");
    }

    public function cptWidgets(){
        return require_once("$this->plugin_path/templates/widget.php");
    }

    public function cptOptionGroup( $input ){
        return $input;
    }

    public function cptAdminSections(){
        echo "Check this section";
    }

    public function cptAdminFields(){
        $value = esc_attr( get_option( 'text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="'. $value .'" placeholder="Write here">';
    }
    
    public function cptFirstName(){
        $value = esc_attr( get_option( 'first_name'));
        echo '<input type="text" class="regular-text" name="first_name" value="'. $value .'" placeholder="Write your first name">';
    }


}