<?php
   $host  = 'localhost';
   $user  = 'root';
   $password   = "";
   $database  = "gestionpoubel";      
   $empTable = 'compte';	
   $dbConnect = false;
   $conn =null;
  if(!$dbConnect){ 
    $conn = new mysqli($host, $user, $password, $database);
    if($conn->connect_error){
        die("Error failed to connect to MySQL: " . $conn->connect_error);
    }else{
        $dbConnect = $conn;
    }
}
?>