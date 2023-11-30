<?php

class Login extends Controller
{
    public function index()
    {
        $this->view("template/header");
        $this->view("auth/login");
        $this->view("template/footer");
    }

    public function check()
    {
        session_start();

        $validate = $this->formValidation($_POST);
        $nomor_induk = $_POST["nomor_induk"];
        $password = $_POST["password"];

        if (!empty($validate)) {
            
            $_SESSION["messageError"] = $validate;
            header("Location:" . BASE_URL . "login");
            exit();
        }


        $data = $this->Model('Login_Model')->authCheck($nomor_induk, $password);
        
        if(array_key_exists('error', $data)){
            $_SESSION["messageError"] = $data;
            header("Location:" . BASE_URL . "login");
            exit();
            
        }
        else {


         
            if ($data['role'] == 'Admin') {
                
                $_SESSION['logged_in'] = $data['nama_user'];
                header("Location:" . BASE_URL . "admin");
                exit();
            }
            if ($data['role'] == 'Mahasiswa') {
                
                $_SESSION['logged_in'] = $data['nama_user'];
                header("Location:" . BASE_URL . "mahasiswa");
                exit();
            }
            if ($data['role'] == 'Dosen') {
                
                $_SESSION['logged_in'] = $data['nama_user'];
                header("Location:" . BASE_URL . "dosen");
                exit();
            }
            
        }

       


    }

    public function logOut() {
        session_start();
        if(isset($_SESSION['logged_in'])){
            session_unset();
        }
        header("Location:" . BASE_URL . "login");
        exit();

    }

    private function formValidation($formData)
    {
        $pesan = array();


        if (isset($formData['nomer_induk'])) {
            $nomer_induk = $formData['nomer_induk'];
            if (!is_numeric($nomer_induk) || strlen($nomer_induk) > 25) {
                $pesan['nomer_induk'] = "Nomor Induk harus berupa angka dan maksimal 25 karakter.";
            }
        }


        if (isset($formData['password'])) {
            $password = $formData['password'];
            if (strlen($password) < 4 || strlen($password) > 25) {
                $pesan['password'] = "Password harus terdiri dari 4 hingga 25 karakter.";
            }
        }


        if (isset($formData['role'])) {
            $role = $formData['role'];
            $allowed_roles = array("admin", "mahasiswa", "dosen");
            if (!in_array($role, $allowed_roles)) {
                $pesan['role'] = "Role hanya boleh berisi 'admin', 'mahasiswa', atau 'dosen'.";
            }
        }

        return $pesan;
    }
}
