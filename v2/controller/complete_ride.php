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

   $json_data = array();

   
   $json_data = $obj->completeRide();
	  
	header('Content-Type: application/json');
	echo json_encode($json_data);

   
?>