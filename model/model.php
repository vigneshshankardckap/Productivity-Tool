<?php 
require 'con.php';

class UserModule extends Database
{

    public function homePage()
    {

        require "view/homepage.html";
        
    }
    

}

