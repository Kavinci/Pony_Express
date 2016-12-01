<?php
/*
 * All of the installation will happen here
 */

class PE_install{
    global $wpdb;
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
        if(/*masterdb doesn't exist*/){

            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE pedb.master (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                to_user NOT NULL,
                from_user NOT NULL,
                subject,
                message NOT NULL,
                to_status,
                from_status, 
                timestamp datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                status_history,
                metadata,
                PRIMARY KEY  (id)
                ) $charset_collate;";
        }
        foreach($arr as $id){
            if($this->checkTable($id) == false)
            {
                
            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE master (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                master_id,
                to_user NOT NULL,
                from_user NOT NULL,
                subject,
                message NOT NULL,
                to_status,
                from_status, 
                timestamp datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                status_history,
                metadata,
                PRIMARY KEY  (id)
                ) $charset_collate;";
            };
        }
    }

    public function checkTable($id)
    {
        $bool = false;

        //Query database for tables based on ID

        return $bool;
    }

    private function checkDB()
    {
        $bool = false;

        //Check for the DB
        //If doesn't exist return false

        return $bool;
    }
}