<?php
 
    include 'config.php';
    $code_p = $_GET['code_p'];
    echo is_exist($code_p);
    function is_exist($code_poubelle)
   {
        include 'config.php';
        $query = "SELECT *FROM `poubelle_data` WHERE  code_poubelle = '$code_poubelle'";
        $result = mysqli_query($conn, $query);
        if($result) {
            $numRows = mysqli_num_rows($result);
            if($numRows){
                $empRecord = mysqli_fetch_assoc($result);
                $poid = $empRecord['poids'];
                return $poid;
            }
            return 0;
         } 
   }
?>