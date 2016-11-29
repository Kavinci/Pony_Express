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
        if(get_option("PE_installed") == false)
        {
            //create DB here

            update_option("PE_installed", true);
        };
    }

    public function createTable($arr)
    {
        foreach($arr as $id){
            if($this->checkTable($id) == false)
            {
                //create tables here
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