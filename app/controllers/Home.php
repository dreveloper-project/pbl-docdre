<?php



class Home extends Controller
{
    public function index(){

       $data['nama'] = $this->model('User_Model')->getuser();
        $this->view("template/header", $data);
        $this->view("home/index");
         $this->view("template/footer");
    }
}


?>