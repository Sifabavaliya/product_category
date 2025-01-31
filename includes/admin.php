<?php
    session_start();
    class Admin{
        
        public $db;

        public function __construct($db){
            if (!$db) {
                die("Database connection not received in Admin class.");
            }
            $this->db = $db;
        } 

        public function login($username,$password){

            if (!$this->db) {
                die("Database connection is null in login method.");
            }        

            $sql = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
            $result = $this->db->query($sql); 
            
            if (!$result) {
                die("Query failed: " . $this->db->error);
            }

            if($result -> num_rows > 0){
                $user = $result -> fetch_assoc();
                $_SESSION['admin'] = $user['id'];
                return true;
            }
            return false;
        }

        public function isloggedIn(){
            return isset($_SESSION['admin']);
        }

        public function logout() {
            session_destroy();
            header("Location: ../index.php");
            exit();
        }
    }

?>