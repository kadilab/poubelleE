<?php
   include 'config.php';

 if (isset($_GET['login'])) {
    $login = $_GET['login'];
    $mdp = $_GET['passe'];
    $query = "SELECT * FROM `login` WHERE login = '$login' AND pwd = '$mdp' ";
    $result = mysqli_query($conn, $query);
    if($result) {
       $numRows = mysqli_num_rows($result);
       if ($numRows > 0) {
         echo "success";
       }
       else
       echo "none";
    } else
    {
      echo "none";
    } 
 }

?>