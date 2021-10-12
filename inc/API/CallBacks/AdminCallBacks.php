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

    public function cptAdminSection(){
        echo "check this section";
    }

    public function cptAdminFields(){
        $value = esc_attr( get_option( 'text_example'));
        echo '<input type="text" class="regular-text" name="text-example" value="'. $value .'" placeholder="Write here">';
    }
    

}