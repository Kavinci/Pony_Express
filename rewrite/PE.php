<?php
/*
	Plugin Name: Pony Express
	Plugin URI: http://www.utterback.co
	Description: Direct messenger platform for WordPress users and admins.
    Version: 1.0
	Author: Kent Utterback
	Author URI: http://www.utterback.co
    License:
    License URI:
    Text Domain:
    Domain Path: /languages
*/

class Pony_Express
{
    public function __construct(){
        $this->define_constants();
        $this->includes();
        $this->init_hooks();

        do_action('');
    }

    //Define the constants for Pony Express
    private function define_constants(){
        $dir = dirname(__FILE__) . '/';
        define('RESOURCES_URL', plugin_dir_url(__FILE__) . 'resources/');
    }

    //Include necessary files here
    public function includes(){

        include_once('classes/admin.class.php');
        include_once('classes/user.class.php');
        include_once('classes/install.class.php');
        include_once('classes/uninstall.class.php');
        include_once('classes/mailbox.class.php');
    }

    //Put initialization hooks here
    private function init_hooks(){
        //activation and deactivation hooks
        register_activation_hook(__FILE__, 'activationHandler');
        register_deactivation_hook(__FILE__, 'deactivationHandler');

        //
        add_action('init', 'load');
    }

    //Search users and create db for PE
    function activationHandler(){

        if(get_option('isPEActive') == 'n'){

            update_option('isPEActive','y');
        }

        add_option('isPEActive','y');
    }

    //Hides all of the pages from admin and users
    function deactivationHandler(){

        if(get_option('isPEActive') == 'y'){

            update_option('isPEActive', 'n');
        }
    }

    function load(){

        if (!defined('is_loaded')) {
            define('is_loaded', '1');
            new adminClass($dir);
            new userClass($dir);
        }
    }
}