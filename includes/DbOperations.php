<?php

    class DbOperation {

        private $con;

        function __construct(){
            require_once dirname(__FILE__).'/DbConnnect.php';

            $db = new DbConnect();

            $this->con = $db->connect();
        }
        /*Create User */
        function createUser($username, $pass, $email){
            $password = md5($pass);
            $stmt = this->con->prepare("INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES (NULL, ?, ?, ?);");
            $stmt->bind_param("sss",$username,$password,$email);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
            
        }
    } 