<?php 
/**
 *  @package ShopCPT
 */
namespace Inc;

 final class Init{
    
    /* Full list of classes*/
     public static function get_services(){
         return [
             Pages\Admin::class,
             Base\Enqueue::class,
             Base\CustomPost::class,
             Base\SettingsLink::class
         ];
     }
     /* Loop through all the classes,initialise an call register method*/
    public static function register_services() {
        foreach(self::get_services()  as $class ){
            $service  = self ::instantiate( $class);
            if(method_exists($service,'register')){
                $service->register();
            }
        }
    }

    /* Initialise the class and return class instance*/   
    public static function instantiate( $class){
        $service = new $class();
        return $service;
    }

 }
