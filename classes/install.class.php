<?php
/*
 * All of the installation will happen here
 */

class PE_install{
    public function __construct()
    {
        $arr = $this->getUsers();
        add_option('isPEInstalled', false);
        $this->checkDB();
        $this->checkUserTable();
        $this->
        foreach($arr as $value){
        $this->checkMailboxTable($value);
        }

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
        $sql = "CREATE DATABASE `pedb`,
        DEFAULT CHARACTER SET utf8,
        COLLATE utf8_general_ci";

        
    }
    private function createUserTable(){

    }

    private function createMasterTable(){

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
    

    private function createMailboxTable($id)
    {
            if($this->checkTable($id) == false)
            {
                
            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE master (
                mailbox_id mediumint(10) NOT NULL AUTO_INCREMENT,
                master_id mediumint(15) NOT NULL,
                to_user TINYTEXT NOT NULL,
                from_user TINYTEXT NOT NULL,
                subject TINYTEXT,
                message LONGTEXT NOT NULL,
                to_status TINYTEXT,
                from_status TINYTEXT, 
                status_change_date TIMESTAMP NOT NULL,
                status_history TEXT,
                metadata LONGTEXT,
                PRIMARY KEY  (mailbox_id)
                ) $charset_collate;";
            };
        }
    }

    public function checkMailboxTable($id)
    {
        //does table exist. if not create it. If so, end
        $res = mysql_query("SHOW TABLES LIKE '$id'");
        $data = mysql_num_rows($res) > 0;

        if(!$res){

        }
    }

    private function checkDB()
    {
        if(get_option('isPEInstalled') == false){
            $this->createDB();
        }
    }
}