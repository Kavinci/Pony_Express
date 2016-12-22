//create a class to handle inputs to the DB and scrub the text
<?php

class pedb{

    private function connect(){
        global $pedb = mysql_connect();
        if(!$pedb){
            die('Could not connect: '. mysql_error());
        }
    }

    private function filter($obj){
        //filter the JSON objects to be written or read
    }

    public function query($query){
        //
        $this->connect();
        $retval = mysql_query($res);
        if(!$retval){
            die('Could not complete query: ' . mysql_error());
        }
    
    }

    private function UIquery($id){
        
    }

    private function checkDB(){

    }

    private function checkTable($id){
        
    }

    private function close(){
        mysql_close($pedb);
    }
}