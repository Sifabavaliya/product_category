<?php

    class Admin{
        
        private $db;

        public function __consruct($db){
            if (!$db) {
                die("Database connection not received in Admin class.");
            }
            $this->db = $db;
        } 

        public function login($username,$password){

            if (!$this->db) {
                die("Database connection is null in login method.");
            }        

            $sql = "SELECT * FROM `admin` WHERE `username`='$username'";
            $result = $this->db->query($sql); 
            
            if (!$result) {
                die("Query failed: " . $this->db->error);
            }

            if($result -> num_rows > 0){
                $user = $result -> fetch_assoc();

                if(password_verify($password , $user['password'])){
                    $_SESSION['admin'] = $user['id'];
                    return true;
                }
            }
            return false;
        }

        public function islogin(){
            return isset($_SESSION['admin']);
        }

        public function logout(){
            unset($_SESSION['admin']);
        }
    }

?>