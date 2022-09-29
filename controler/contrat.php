<?php
  

  //date_debut=2022-08-25&date_fin=2022-09-10&Ref=Ref001&client=1&poubelle=1&type_contrat=1#
  if(isset($_GET['insert']))
    insert();
  function insert()
  {
    include 'config.php';
    $date_debut = $_GET['date_debut'];
    $date_fin = $_GET['date_fin'];
    $ref = $_GET['Ref'];
    $client_id = $_GET['client'];
    $poubelle_id = $_GET['poubelle'];
    $type_contrat_id = $_GET['type_contrat'];
    $description = $_GET['description'];

    //requette d'insertion
    $query = "INSERT INTO `contrats` (`Ref`, `Description`, `date_Debut`, `date_Fin`, `code_poubelle`, `login`, `type_contrat`) VALUES (NULL, '$description', '$date_debut', '$date_fin', '$poubelle_id', '$client_id', '$type_contrat_id');";
    
    if( mysqli_query($conn, $query)) {
        $messgae = "Employee created Successfully.";
        $status = 1;	
        
        header("Location: ../contrat.php");
        exit();	

    } else {
        $messgae = "Employee creation failed.";
        $status = 0;		
        var_dump($messgae);		
    }
  }
  function read()
  {
    
  }
?>