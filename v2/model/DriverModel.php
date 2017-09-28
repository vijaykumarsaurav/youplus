<?php
/**
*  Model for Driver Api
*
* @package    Model
* @author     Vijay Kumar
* 
* 
*/

   class DriverModel {
        private $conn;
        private $status;
        private $data;
        private $result = array();


        public function __construct($db){
           $this->conn =  $db->getConnection();
        }

        public function waittingCustomers(){

        $sql = "SELECT * FROM driver";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $data[] = $row ;
            }
        } 
         // $this->db->closeConnection();

         return $data;
      }

        public function rideNow(){
                         
        $sql = "INSERT customer SET `cust_id`='$_POST[Customer_ID]'";

        if ($this->conn->query($sql) === TRUE) {

            $last_id = $this->conn->insert_id;
            $date = date("Y-m-d h:i:s");
            $sql = "INSERT `ride` SET `req_id`='$last_id',`driver_id`='0',`req_at`= '$date',`selected_at`='0000-00-00 00:00:00',`completed_at`='0000-00-00 00:00:00',`status`=0";
             if ($this->conn->query($sql) === TRUE) {
              $this->status = "OK";
              $this->data = "Success";
             }else{
              $this->status = "ERR";
              $this->data = "Error: " . $sql . "<br>" . $conn->error;
             }

        } else {
             $this->status = "ERR";
             $this->data = "Error: " . $sql . "<br>" . $conn->error;
        }
         // $this->db->closeConnection();
         $this->result = array('status' => $this->status , 'data' => $this->data);

         return $this->result;
      }


       public function refreshDriverDashborad($driver_id){
                         
         $sql = "SELECT * FROM `ride` WHERE  `driver_id` = 0 or `driver_id` = '$driver_id' ORDER BY ride_id DESC";

        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {
            // output data of each row
            while($row = $res->fetch_assoc()) {

                  $res1 = $this->conn->query("SELECT cust_id FROM customer WHERE req_id = $row[req_id]");
                  $row1 =  $res1->fetch_assoc();
                  $row['cust_id'] = $row1['cust_id'];

                  $this->result[] = $row;
                  $this->status = "OK";
            }

        }

        $this->result = array('status' => $this->status , 'data' =>  $this->result);
        return $this->result;
      }

      public function selectRide(){
            $date = date("Y-m-d h:i:s");
            $sql = "UPDATE `ride` SET `driver_id`='$_POST[driver_id]',`selected_at`='$date',`status`='1' WHERE ride_id = '$_POST[ride_id]'";
             if ($this->conn->query($sql) === TRUE) {
              $this->status = "OK";
              $this->data = "Success";
             }else{
              $this->status = "ERR";
              $this->data = "Error: " . $sql . "<br>" . $conn->error;
             }
         // $this->db->closeConnection();
         $this->result = array('status' => $this->status , 'data' => $this->data);

         return $this->result;
      }

       public function completeRide(){
            $date = date("Y-m-d h:i:s");
            $sql = "UPDATE `ride` SET `completed_at`='$date',`status`='2' WHERE ride_id = '$_POST[ride_id]' AND driver_id='$_POST[driver_id]'";
             if ($this->conn->query($sql) === TRUE) {
              $this->status = "OK";
              $this->data = "Success";
             }else{
              $this->status = "ERR";
              $this->data = "Error: " . $sql . "<br>" . $conn->error;
             }
         // $this->db->closeConnection();
         $this->result = array('status' => $this->status , 'data' => $this->data);

         return $this->result;
      }
      
          public function refreshMainDashborad(){
                         
         $sql = "SELECT * FROM `ride` ORDER BY ride_id DESC";

        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {
            // output data of each row
            while($row = $res->fetch_assoc()) {

                  $res1 = $this->conn->query("SELECT cust_id FROM customer WHERE req_id = $row[req_id]");
                  $row1 =  $res1->fetch_assoc();
                  $row['cust_id'] = $row1['cust_id'];

                  $this->result[] = $row;
                  $this->status = "OK";
            }

        }

        $this->result = array('status' => $this->status , 'data' =>  $this->result);
        return $this->result;
      }

      


   }

?>