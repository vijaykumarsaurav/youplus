<?php
/**
*  Model for Driver Api
*
* @package    Model
* @author     Vijay Kumar
* 
* 
*/
  require_once('../config/config.php');

/*  $db = new Database;
  $conn =  $db->getConnection();
  $db->closeConnection($conn);*/
  
   class Database {
    private $conn=null;
    public function getConnection(){
        // Create connection
        $this->conn = mysqli_connect(HOST, USERNAME, PASSWORD , DB);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } 
       // echo "Connected successfully";

        return $this->conn;
    }
     
     public function closeConnection(){
      $this->conn->close();
      echo "Closed successfully";      
    /*  if($conn->close())
      echo "Closed successfully";      */
    }
     
   }

?>