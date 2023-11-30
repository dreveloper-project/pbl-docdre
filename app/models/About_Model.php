<?php 

class About_Model extends Model 
{
    // 

    public function getData() {

        $conn = $this->connect();
        $sql = "SELECT * FROM users";

        $action = $conn->query($sql);
        $rows = $action->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
        

    }
}


?>