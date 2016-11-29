<?php
/*
    Description: User class initializes the user side of the plugin.
*/

class userClass
{
    private $dirPath;

    public function __construct($path)
    {
        $this->dirPath = $path;

        //Action hooks
        add_action('wp_footer', array($this, 'ui_scripts'));
        add_action('wp_footer', array($this, 'ui_style'));

        //Filter hooks

        //Shortcodes
        add_shortcode('user-inbox', array($this, 'inbox_shortcode'));
        add_shortcode('user-interface', array($this, 'interface_shortcode'));
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

    public function inbox_shortcode($atts)
    {
        echo "User Inbox goes here. "; //file_get_contents(RESOURCES_URL . 'fillerInbox.html');
    }

    public function interface_shortcode($atts)
    {
        echo "This will be used for quick messages. "; //file_get_contents(RESOURCES_URL . 'fillerSettings.html');
    }
}
