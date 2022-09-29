<?php
 
    include 'config.php';
    $code_p = $_GET['code_p'];
    $niveau = $_GET['niveau'];
    $poid = $_GET['poid'];

    $req = "";
    if (is_exist($code_p)) {
        // update
        $req = "UPDATE `poubelle_data` SET `niveau`='$niveau',`poids`='$poid' WHERE code_poubelle = '$code_p'";
    }else
    {
        $req = "INSERT INTO `poubelle_data` (`id`, `code_poubelle`, `niveau`, `poids`) VALUES (NULL, '$code_p', '$niveau', '$poid')";
       //add
    }
    //execution de la requette
    $result = mysqli_query($conn, $req);
    echo "donne fourne";
   //affichage du resultat de l'execution

  //verifie si une poubelle est enregistrer
   function is_exist($code_poubelle)
   {
        include 'config.php';
        $query = "SELECT *FROM `poubelle_data` WHERE  code_poubelle = '$code_poubelle'";
        $result = mysqli_query($conn, $query);
       if($result) {
          var_dump($result);
          $numRows = mysqli_num_rows($result);
		  return $numRows;
       } 
   }
?>