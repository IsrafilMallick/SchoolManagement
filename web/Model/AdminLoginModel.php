<?php

include_once __DIR__ . '/../Config/DatabaseConnection.php';
?>
<?php

class AdminLoginModel {

    private $conn = null;
    private $table = null;

    public function __construct() {
        $dbConnection = new DatabaseConnection();
        $this->conn = $dbConnection->connect();

        if ($this->conn) {
            $this->table = 'adminlogin';
        } else {
            echo 'Connection Error';
            die();
        }
    }
    public function fetchAllData() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table ");
            $stmt->execute();
            $fetchAllData = $stmt->fetchAll(PDO::FETCH_OBJ);

            if ($fetchAllData) {
                return $fetchAllData;
            } else {
                return FALSE;
            }
        } catch (PDOException $e) {

            return FALSE;
        } catch (Exception $e) {

            return FALSE;
        }
    }
    
    public function fetchDataById($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = :id");
            $stmt->execute(array(
                "id" => $id
            ));
            $fetchAllData = $stmt->fetch(PDO::FETCH_OBJ);

            if ($fetchAllData) {
                return $fetchAllData;
            } else {
                return FALSE;
            }
        } catch (PDOException $e) {

            return FALSE;
        } catch (Exception $e) {

            return FALSE;
        }
    }
    


    public function checkUserIdExists($userName){
        try{

            $stmt = $this->conn->prepare("SELECT id FROM " . $this->table . " WHERE BINARY userName = :userName");
            $stmt->bindParam(":userName", $userName);
            $stmt->execute();

            $stmtData = $stmt->rowCount();

            if($stmtData){
                return $stmtData;
            }else{
                return FALSE;
            }

        } catch (PDOException $e){

            return FALSE;

        } catch (Exception $e){

            return FALSE;
        }


    }

    public function checkUserIdActive($userName){
        try{

            $stmt = $this->conn->prepare("SELECT id FROM " . $this->table . " WHERE BINARY userName = :userName AND stat=0");
            $stmt->bindParam(":userName", $userName);
            $stmt->execute();

            $stmtData = $stmt->rowCount();

            if($stmtData){
                return $stmtData;
            }else{
                return FALSE;
            }

        } catch (PDOException $e){

            return FALSE;

        } catch (Exception $e){

            return FALSE;
        }


    }

    public function fetchDataByUserName($userName){
        try{

            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE BINARY userName = :userName");
            $stmt->bindParam(":userName", $userName);
            $stmt->execute();

            $fetchAllData = $stmt->fetch(PDO::FETCH_OBJ);

            if($fetchAllData){
                return $fetchAllData;
            }else{
                return FALSE;
            }

        } catch (PDOException $e){

            return FALSE;

        } catch (Exception $e){

            return FALSE;
        }


    }

    public function checkSessionExists($sessionId){

        try{

            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE BINARY sessionId = :sessionId");
            $stmt->bindParam(":sessionId", $sessionId);
            $stmt->execute();

            $stmtData = $stmt->fetch(PDO::FETCH_OBJ);
			

            if($stmtData){
                return $stmtData;
            }else{
                return FALSE;
            }

        } catch (PDOException $e){

            return FALSE;

        } catch (Exception $e){

            return FALSE;
        }


    }

    public function updateSession($userName, $sessionId, $ip, $lastLoginTime) {

        try {

            $updateData = $this->conn->prepare("UPDATE " . $this->table . " SET sessionId = :sessionId, lastLoginTime =:lastLoginTime, ip = :ip WHERE userName = :userName");
            $updateData->bindParam(":sessionId", $sessionId);
            $updateData->bindParam(":lastLoginTime", $lastLoginTime);
            $updateData->bindParam(":ip", $ip);
            $updateData->bindParam(":userName", $userName);
            $updateData->execute();
            
            $updateStatus = $updateData->rowCount();
            
            if ($updateStatus) {
                return $updateStatus;
            } else {
                return FALSE;
            }
        } catch (PDOException $e) {

            return FALSE;
        } catch (Exception $e) {

            return FALSE;
        }
    }

}