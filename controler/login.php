<?php
   if(isset($_GET['login']))
   {
    $username = $_GET['username'];
    $pwd = $_GET['password'];
     
     getlogin($username,$pwd);
   }
   function getlogin($empId,$pwd) {	
    require_once 'config.php';

    $sqlQuery = '';
    if($empId) {
        $sqlQuery = " WHERE login = '".$empId."' AND pwd = '".$pwd."'   AND type_compte = 'admin'";
    }	
    $empQuery = " SELECT * FROM login". $sqlQuery;	
        
    $resultData = mysqli_query($conn, $empQuery);
    $empData = array();
    if($resultData->num_rows){
        session_start();
        
        header("Location: ../home.php");
        exit();
    }
    else
    {
        header("Location: ../login.php");
    }

}
?>