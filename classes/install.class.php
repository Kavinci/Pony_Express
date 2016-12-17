<?php
/*
 * All of the installation will happen here
 */

class PE_install{
    public function __construct()
    {
        $arr = $this->getUsers();
        $this->createDB();
        $this->createTable($arr);

    }

    private function getUsers()
    {
        $us = get_users();
        $arr = [];
        $i = 0;

        foreach ( $us as $user )
        {
            $arr[$i] = $user->ID;
            $i++;
        };

        return $arr;
    }

    private function createDB()
    {
        $db_name = "pedb"
        if(get_option("PE_installed") == false)
        {
            $sql = "CREATE DATABASE `pedb`,
            DEFAULT CHARACTER SET utf8,
            COLLATE utf8_general_ci";

            update_option("PE_installed", true);
        };
    }

    public function createTable($arr)
    {
        if(get_option("PE_installed") == false){

            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE pedb.master (
                master_id mediumint(15) NOT NULL AUTO_INCREMENT,
                to_user TINYTEXT NOT NULL,
                from_user TINYTEXT NOT NULL,
                subject TINYTEXT,
                message LONGTEXT NOT NULL,
                to_status TINYTEXT,
                from_status TINYTEXT, 
                state_change_date TIMESTAMP NOT NULL,
                status_history TEXT,
                metadata LONGTEXT,
                PRIMARY KEY  (master_id)
                ) $charset_collate;";
        }
    }
}