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
}