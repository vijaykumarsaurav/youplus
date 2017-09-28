<?php
/**
*  Model for Generate Subtraction
*
* @package    Model
* @author     Vijay Kumar
* 
*
*/

   require_once('../model/DriverModel.php');

   require_once('../model/database.php');


   $db =  new Database;
   $obj = new DriverModel( $db );

   $resArr = array();
   $type = $_GET['type'];
   
   if ($type == 1) {
       $resArr = $obj->refreshMainDashborad();
   }else if ($type == 2) {
   	   $driver_id = $_GET['driver_id'];
       $resArr = $obj->refreshDriverDashborad($driver_id);
   }

   $data = json_encode($resArr);

	header('Content-Type: text/event-stream');
	header('Cache-Control: no-cache');

	echo "data: {$data}\n\n";
	flush();
   
?>