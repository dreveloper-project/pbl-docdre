<?php

class Dosen extends Controller
{
    public function __construct() {
       $this->Middleware('Dosen_Middleware');
    }
    public function index()
    {
        $this->view("template/header");
        $this->view("dosen/index");
        $this->view("template/header");
    }
}


?>