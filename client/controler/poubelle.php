<?php
  //date_debut=2022-08-25&date_fin=2022-09-10&Ref=Ref001&client=1&poubelle=1&type_contrat=1#
  if(isset($_GET['add']))
       insert();
  function insert()
  {
    include 'config.php';
    $code  = $_GET['code'];
    $taille  = $_GET['taille'];
    $query = "INSERT INTO `n_poubelle` (`code`, `taille`) VALUES ('$code', '$taille');";
    
    if( mysqli_query($conn, $query)) {
        $messgae = "poubelle created Successfully.";
        $status = 1;	
        
        header("Location: ../poubelle.php");
        exit();	

    } else {
        $messgae = "poubelle creation failed.";
        $status = 0;		
        var_dump($messgae);		
    }
  }


  function ajouter()
  {

  }


  function edit()
  {


  }
?>