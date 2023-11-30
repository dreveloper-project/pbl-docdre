<?php
    class Mahasiswa_Middleware 
    {
        public function __construct() {
            session_start();
            if(!isset($_SESSION['logged_in'])){
                header("Location:".BASE_URL."login");
                exit();
            }
            
       } 
    }
    
?>