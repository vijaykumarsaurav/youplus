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

   // $noq = $_REQUEST['noq'];


   $db =  new Database;
   $obj = new DriverModel( $db );

   $json_data = array();

   
   $json_data = $obj->rideNow();
  

 
/*
echo "<pre>";
echo $_SERVER['REQUEST_URI'];
echo "</pre>";*/

header('Content-Type: application/json');
echo json_encode($json_data);

   
?>