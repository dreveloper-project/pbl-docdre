<?php
    class Admin_Model extends Model 
    {
        public function regist($nama_user, $password, $role, $nomor_induk, $prodi, $email, $nomor_telepon, $alamat) {
            try {
  
                // Sambung ke database
                $db = $this->connect();
                
                // Siapkan query
                $sql = "INSERT INTO users(nama_user, password, role, nomor_induk, prodi, email, nomor_telepon, alamat) 
                        VALUES(:nama_user, :password, :role, :nomor_induk, :prodi, :email, :nomor_telepon, :alamat)";
                         
                
                $statement = $db->prepare($sql);
                
                
                $data = [
                  ":nama_user" => $nama_user,
                  ":password" => password_hash($password, PASSWORD_DEFAULT), 
                  ":role" => $role,
                  ":nomor_induk" =>$nomor_induk,
                  ":prodi" => $prodi,  
                  ":email" => $email,
                  ":nomor_telepon" => $nomor_telepon,
                  ":alamat" => $alamat
                ];
                  
                
                $info = $statement->execute($data);
              
                
                return "Berhasil";
                
              } catch(PDOException $e) {
              
                // Gagal
                return "Terjadi kesalahan: " . $e->getMessage();
              }
        }

        public function getAllUser(){

          try {
            
            $dbh = $this->connect();
            
            
            $sql = "SELECT id_user, nama_user, role, nomor_induk,  prodi, nomor_telepon FROM users";
            
             
            $stmt = $dbh->query($sql);
            
           
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
            
          } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
        }

        public function getAllDocument(){
    try {

      $dbh = $this->connect();


      $sql = "SELECT id_surat, nama_surat, deskripsi, tanggal FROM surat_tugas";


      $stmt = $dbh->query($sql);


      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
        }

        public function getUser($id){
          try {
            
            $dbh = $this->connect();
            
            
            $sql = "SELECT * FROM users WHERE id_user = '$id'";
            
             
            $stmt = $dbh->query($sql);
            
           
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
            
          } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
        }

        public function deleteUser($id){

          try {
            $dbh = $this->connect();
          
            
          
            // Query delete
            $sql = "DELETE FROM users WHERE id_user = :id";
          
            $stmt = $dbh->prepare($sql);
          
            $stmt->bindParam(':id', $id);
          
            // Eksekusi query delete
            $stmt->execute();
          
            return true;
          
          } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
          }

        }

        public function saveChanges($id, $data){
          try {
            $dbh = $this->connect();
            
            
            // Query update
            $sql = "UPDATE users 
                    SET nama_user=:nama_user, password=:password, role=:role, nomor_induk=:nomor_induk, prodi=:prodi, 
                    email=:email, nomor_telepon=:nomor_telepon, alamat=:alamat  
                    WHERE id_user=:id_user";
                     
            $stmt = $dbh->prepare($sql);
            
            // Bind parameter 
            $stmt->bindParam(':id_user', $data["id_user"]);
            $stmt->bindParam(':nama_user', $data["nama_user"]);
            $stmt->bindParam(':password', password_hash($data["password"], PASSWORD_DEFAULT));
            $stmt->bindParam(':role', $data["role"]);
            $stmt->bindParam(':nomor_induk', $data["nomor_induk"]);
            $stmt->bindParam(':prodi', $data["prodi"]);
            $stmt->bindParam(':email', $data["email"]);
            $stmt->bindParam(':nomor_telepon', $data["nomor_telepon"]);
            $stmt->bindParam(':alamat', $data["alamat"]);
           
            
          
            $stmt->execute();
            
            return true;
             
          } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
        }
    }
    
?>