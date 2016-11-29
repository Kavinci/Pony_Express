<?php
/*
    Login class to handle the login for PE
*/

  class loginClass
  {
    private $dirPath;

    public function __construct($path)
    {
      //A short code will be needed for login page form
        $this->dirPath = $path;
        echo "Hello World from the Login Class";
      //Do an if not logged in then show form

      
      //Do an if logged in then show nothing.
    }
  }
  ?>
