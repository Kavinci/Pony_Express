<?php
/*
    Description: Admin class initializes the admin side of the plugin.
*/

class adminClass
{
    private $dirPath;

    public function __construct($path)
    {
        $this->dirPath = $path;

        //Action hooks
        add_action('admin_menu', array( $this, 'PE_UI'));
        add_action('wp_before_admin_bar_render', array($this, 'bar'));
        add_action('admin_enqueue_scripts', array($this, 'ui_scripts'));
        add_action('admin_enqueue_scripts', array($this, 'ui_style'));
        //Filter hooks
    }

    public function bar()
    {
        global $wp_admin_bar;

        $args = array(
            'id'    =>  'inbox',
            'title' =>  __('Inbox','text_domain'),
            'href'  =>  '/wordpress/wp-admin/admin.php?page=inbox'
        );
        $wp_admin_bar->add_menu($args);

    }

    public function PE_Settings(){

        //register_settings('PE_Messenger_Settings','PE_DB_Settings', null);
        //add_settings_section('PE_DB','Pony Express Database Settings','callback', 'PE_Messenger_Settings');
        //add_settings_field('id','title','callback','PE_Messenger_Settings','PE_DB',array());
    }
    public function PE_UI()
    {
        add_menu_page('Messenger', 'Messenger', 'manage_options', 'PE_Messenger_settings', array($this, 'inbox_settings'));
        //add_submenu_page('messenger', 'Messenger Settings', 'Inbox', 'manage_options', 'PE_Settings', array($this, 'inbox_content'));
        add_submenu_page('messenger', 'Inbox', 'Inbox', 'manage_options', 'PE_inbox', array($this, 'inbox_content'));
    }

    public function ui_scripts()
    {
        wp_register_script('jquery3.1', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', array('jquery'));
        wp_enqueue_script('jquery3.1');

        wp_register_script('jquery-ui-accordian', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jquery3.1'));
        wp_enqueue_script('jquery-ui-accordian');

        wp_register_script('filler', RESOURCES_URL . 'filler.js', array('jquery-ui-accordian'));
        wp_enqueue_script('filler');
    }

    public function ui_style()
    {
        wp_register_style('jquery-ui-accordian', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');
        wp_enqueue_style('jquery-ui-accordian');
    }

    public function inbox_settings()
    {
        echo "Admin Settings go here. "; ?> <br> <br> <?php


        echo "isPEActive: " . get_option('isPEActive');
    }

    public function inbox_content()
    {
        echo "Admin Inbox goes here. ";
        //echo file_get_contents(RESOURCES_URL . 'fillerInbox.html');
    }
}
