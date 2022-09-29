<?php


    if(isset($_GET['ajouter']))
    {
        ajouter();
        
    }else
    {
        edit();
    }


  function ajouter()
  {
     include 'config.php';
     $nom = $_GET['nom'];
     $login = $_GET['login'];
     $pwd = $_GET['pwd'];
     $adresse = $_GET['adresse'];
     $type_compte = $_GET['type_compte'];
     $query = "INSERT INTO `login` (`id`, `nom`, `login`, `pwd`, `type_compte`, `adresse`) VALUES (NULL, '$nom', '$login', '$pwd', '$type_compte', '$adresse');
     ";
     $result = mysqli_query($conn, $query);
     if($result) {

        header("Location: ../users.php");
        exit();
     } 
    
  }

  function edit()
  {
    $id_user = $_GET['id_user'];
    $nom = $_GET['nom'];
    $login = $_GET['login'];
    $pwd = $_GET['pwd'];
    $adresse = $_GET['adresse'];
    $type_compte = $_GET['type_compte'];
    include 'config.php';
    $qrt = "UPDATE `login` SET `nom`='$nom',`login`='$login',`pwd`='$pwd',`type_compte`='$type_compte',`adresse`='$adresse' WHERE id='$id_user'";
    $result = mysqli_query($conn, $qrt);
     if($result) {
        header("Location: ../users.php");
        exit();
     } 
  }

?>