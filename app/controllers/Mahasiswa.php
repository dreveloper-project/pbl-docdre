<?php

class Mahasiswa extends Controller
{
    public function __construct() {
       $this->Middleware('Mahasiswa_Middleware');
    }
    public function index()
    {
       
        $this->view("mahasiswa/index");
    }
}


?>