<?php
    class Admin extends Controller 
    {

        // MIddleware
        public function __construct() {
            $this->Middleware('Admin_Middleware');
         }



        //  view
        public function index()
        {
            $this->view("template/header");
            $this->view("admin/index");
            $this->view("template/footer");
        }

        public function document(){
            $this->view("template/header");
            $data = $this->Model('Admin_Model')->getAllDocument();
            $this->view("admin/document", $data);
            $this->view("template/footer");
        }


        // User management
        public function user(){
            $this->view("template/header");
            $data = $this->Model('Admin_Model')->getAllUser();
            $this->view("admin/user", $data);
            $this->view("template/footer");
        }

        public function tambahUser() {
            $this->view("template/header");
            $data = $this->Model('Admin_Model')->getAllUser();
            $this->view("admin/tambahuser", $data);
            $this->view("template/footer");
        }

        public function ubahUser($user){
            $this->view("template/header");
            $data = $this->Model('Admin_Model')->getUser($user);
            $this->view("admin/ubahuser", $data);
            $this->view("template/footer");
        }

        public function simpanPerubahan($id){
            $validate = $this->formValidation($_POST);
            if (!empty($validate)) {
            
                $_SESSION["messageError"] = $validate;
                
                header("Location:" . BASE_URL . "admin/ubahuser/".$id);
                exit();
            }

            $insert = $this->Model('Admin_Model')->saveChanges($id, $_POST);

            if($insert === true){
                $_SESSION["messageSuccess"] = "Data Diubah !";
                
                header("Location:" . BASE_URL . "admin/user");
                exit();
            }
        }
    public function hapusSurat($id)
    {
        $hapus = $this->Model('Surat_Model')->deleteDocument($id);
        $name = $this->Model('Surat_Model')->getName($id);
        if ($hapus === true) {
            unlink("surat/" . $name);
            $_SESSION["messageSuccess"] = "Data Dihapus !";

            header("Location:" . BASE_URL . "admin/document");
            exit();
        } else {
            return $hapus;
        }
    }
        public function hapusUser($id){
            $hapus = $this->Model('Admin_Model')->deleteUser($id);
            if($hapus === true){
                $_SESSION["messageSuccess"] = "Data Dihapus !";
                
                header("Location:" . BASE_URL . "admin/user");
                exit();
            }
            else {
               return $hapus;
            }
        }

        // document management
        public function terbitSurat() {
            $this->view("template/header");
            $data = $this->Model('Admin_Model')->getAllUser();
            $this->view("admin/terbitsurat", $data);
            $this->view("template/footer");
        }   

        public function terbit() {
                $namafile = $_FILES['fileinputan']['name'];
                $temp = $_FILES['fileinputan']['tmp_name'];
                $ekstensi = pathinfo($namafile, PATHINFO_EXTENSION);

                $dir = "surat/";
                
                $id = $this->Model('Login_Model')->getIdUser($_SESSION["logged_in"]);
               
                move_uploaded_file($temp, $dir . $namafile);

                $this->Model("Surat_Model")->inputFile($namafile,$id, $_POST['deskripsi']);

                $_SESSION["messageSuccess"] = "File Berhasil Disimpan";

                header("Location:" . BASE_URL . "admin/document");
                exit();


        }


        // form process
        public function kirimUser(){
            $validate = $this->formValidation($_POST);
            
            if (!empty($validate)) {
            
                $_SESSION["messageError"] = $validate;
                
                header("Location:" . BASE_URL . "admin/tambahuser");
                exit();
            }
           
        //     // echo "Gas"; gimana cara buat insert data ke pdo gaes??
              $insert = $this->Model('Admin_Model')->regist($_POST['nama_user'], $_POST['password'], $_POST['role'], $_POST['nomor_induk'], $_POST['prodi'], $_POST['email'], $_POST['nomor_telepon'], $_POST['alamat']);
           if ($insert == "Berhasil") {
            $_SESSION["messageSuccess"] = "Data Ditambahkan !";
                
            header("Location:" . BASE_URL . "admin/user");
            exit();
           }

           else{
            $_SESSION["messageError"] = $insert;
                
            header("Location:" . BASE_URL . "admin/tambahuser");
            exit();
           }
            
        }


        public function formValidation($dataToValidate){
            $pesan = array();
                  
            if (empty($dataToValidate['nama_user']) || strlen($dataToValidate['nama_user']) > 50) {
                $pesan['nama_user'] = "Nama User tidak boleh kosong dan maksimal 50 karakter.";
            }

           
            if (empty($dataToValidate['nomor_induk']) || strlen($dataToValidate['nomor_induk']) > 50) {
                $pesan['nomor_induk'] = "Nomor Induk tidak boleh kosong, maksimal 50 karakter, dan tidak boleh ada spasi.";
            }

            
            if (empty($dataToValidate['email']) || !filter_var($dataToValidate['email'], FILTER_VALIDATE_EMAIL) || strlen($dataToValidate['email']) > 50) {
                $pesan['email'] = "Email harus valid, tidak boleh kosong, dan maksimal 50 karakter.";
            }

            if ( strlen($dataToValidate['nomor_telepon']) > 50) {
                $pesan['nomor_telpon'] = "Nomor Telpon tidak boleh kosong, maksimal 50 karakter, dan tidak boleh ada spasi.";
            }

            
            if (empty($dataToValidate['alamat']) || strlen($dataToValidate['alamat']) > 150) {
                $pesan['alamat'] = "Alamat tidak boleh kosong dan maksimal 150 karakter.";
            }

            
            if (empty($dataToValidate['password']) || empty($dataToValidate['repeatPassword']) || $dataToValidate['password'] !== $dataToValidate['repeatPassword']) {
                $pesan['password'] = "Password dan Repeat Password harus sama dan tidak boleh kosong.";
            }

            return $pesan;
                }
        

    }
    
?>