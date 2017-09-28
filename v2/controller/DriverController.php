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

    $type = $_REQUEST['type'];
   // $noq = $_REQUEST['noq'];


   $db =  new Database;
   $obj = new DriverModel( $db );

   $json_data = array();

   if ($type == 1) {
      $json_data = $obj->waittingCustomers();
   }

 /*  if ($type == 2) {
     echo $obj->problemTypeTwo($noq);
   }

   if ($type == 3) {
     echo  $obj->problemTypeThree($noq); 
   }

   if ($type == 4) {
     echo  $obj->problemTypeFour($noq); 
   }

   if ($type == 5) {
     echo  $obj->problemTypeFive($noq); 
   }*/
/*
echo "<pre>";
echo $_SERVER['REQUEST_URI'];
echo "</pre>";*/

header('Content-Type: application/json');
echo json_encode($json_data);

   
?>