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

            $dir = dirname(__FILE__) . '/';
            include_once($dir . 'classes/admin.class.php');
            include_once($dir . 'classes/user.class.php');
            define('RESOURCES_URL', plugin_dir_url(__FILE__) . 'resources/');



            new adminClass($dir);
            new userClass($dir);
        }
    }
    //activation and deactivation hooks
    register_activation_hook(__FILE__, 'activationHandler');
    register_deactivation_hook(__FILE__, 'deactivationHandler');

    //
    add_action('init', 'load');