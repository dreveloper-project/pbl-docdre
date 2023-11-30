<?php 

class Surat_Model extends Model 
{
   public function inputFile($nama, $id, $deskripsi) {
        try {
            $db = $this->connect();

            // Siapkan query
            $sql = "INSERT INTO surat_tugas(nama_surat, id_user, deskripsi, tanggal) 
                        VALUES(:nama_surat, :id_user, :deskripsi, :tanggal)";


            $statement = $db->prepare($sql);
            $tanggal_hari_ini = date("Y-m-d");

            $data = [
                ":nama_surat" => $nama,
                ":id_user" => $id,
                ":deskripsi" => $deskripsi,
                ":tanggal" => $tanggal_hari_ini
            ];


            $info = $statement->execute($data);


            return "Berhasil";
        } catch (PDOException $e) {
            echo $e;
        }
   }
   public function getName($id){
        try {
            $conn = $this->connect();
            $sql = "SELECT nama_surat FROM surat_tugas WHERE id_surat = :id"; 
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
            } 

            catch
        (PDOException $e) {
            return $e;
        }
   }
   public function deleteDocument($id){
        try {
            $dbh = $this->connect();



            // Query delete
            $sql = "DELETE FROM surat_tugas WHERE id_surat = :id";

            $stmt = $dbh->prepare($sql);

            $stmt->bindParam(':id', $id);

            // Eksekusi query delete
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

   }
}



?>