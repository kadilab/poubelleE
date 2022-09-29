<?php
  include 'config.php';

  $_code_poubelle = $_GET['code_poubelle'];
  $_prix = $_GET['prix'];
  $_poids = $_GET['poids'];
  confirm($_code_poubelle,$_poids,$_prix);
  

  function confirm($code_poubelle,$poids,$prix)
   {
        include 'config.php';
        $query = "INSERT INTO `historique_prelevement` (`id`, `Poids`, `code_poubelle`) VALUES (NULL, '$poids', '$code_poubelle');";
        $result = mysqli_query($conn, $query);
        

        paiement(getLastId(),$prix);
        if($result) {
           
            return 1;
        } 

   }


   function paiement ($id_hitorique,$montant)
   {
       include 'config.php';
       $req = "INSERT INTO `paiements` (`id_historique`, `montant`) VALUES ('$id_hitorique', '$montant')";
       $result = mysqli_query($conn, $req);
       if($result)
          return 1;
   }

   function getLastId() : int
   {
      include 'config.php';

       $query = "SELECT MAX(id) as lastId FROM `historique_prelevement`";

       $result = mysqli_query($conn, $query);

       $row = $result -> fetch_array(MYSQLI_ASSOC);

       return  $row['lastId'];
   }


?>