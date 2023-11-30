<?php 

class Login_Model extends Model 
{
    public function authCheck($nomor_induk, $password) {
        
        
        try{
            $conn = $this->connect();
            $sql = "SELECT * 
            FROM users
            WHERE nomor_induk = '$nomor_induk';";
    
            $action = $conn->query($sql);

            if ($action->rowCount() > 0) {
                $row = $action->fetchAll(PDO::FETCH_ASSOC);
                while ($row) {
                    
                    if (!password_verify($password, $row[0]["password"])) {

                        $message = ["error" => "Password Salah !"];
                        return $message;
                    
                    }
                    else {
                        return $row[0];
                    }
                    
                }
            } else {
               
                $message = ["error" => "Pengguna Dengan ID ".$nomor_induk ." Sedang Di Mawar Jingga"];
                return $message; 
            }
    
            

        }
        catch (PDOException $e) {
            return $e->getMessage();
            
        }
    }

    public function getIdUser($nama){
        try {
            $conn = $this->connect();
            $sql = "SELECT * 
            FROM users
            WHERE nama_user = '$nama';";

            $action = $conn->query($sql);

            if ($action->rowCount() > 0) {
                $row = $action->fetch(PDO::FETCH_ASSOC);
                while ($row) {

                        return $row['id_user'];
                   
                }
            } 
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}


?>