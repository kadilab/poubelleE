<?php
  
  include 'controler/config.php';
  $id_user = 0;
  $nom = "";
  $login = "";
  $pwd = "";
  $adresse ="";

  $user = array();
  if(isset($_GET['dellet']))
  {
    $id = $_GET['id_compte']; 
    
    $empQuery = "DELETE FROM `login` WHERE id = $id";	
    $resultData = mysqli_query($conn, $empQuery);
    
  }
  if(isset($_GET['edit']))
  {
    $id_user = $_GET['id_compte'];
    $qrt = "SELECT *FROM `login` WHERE id = '$id_user'";
    $RST = mysqli_query($conn, $qrt);
    
    $user = mysqli_fetch_assoc($RST);
    $nom = $user['nom'];
    $login = $user['login'];
    $pwd = $user['pwd'];
    $adresse = $user['adresse'];
  
  }



  $empQuery = "SELECT * FROM login";	
  $resultData = mysqli_query($conn, $empQuery);
  $empData = array();
  $i = 0;

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include 'include/style.php';
  ?>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php
    include 'include/header.php';
     include 'include/aside.php';
  ?>
  
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <!-- <h1>Blank Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->
    <div class="section">
      <div class="row">
        <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste des utilisateurs</h5>
              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Login</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($empRecord = mysqli_fetch_assoc($resultData)): $i++;?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$empRecord['nom']?></td>
                    <td><?=$empRecord['login']?></td>
                    <td><?=$empRecord['type_compte']?></td>
                    <td>
                      <div class="row">
                        <div class="col-md-6">
                              <form action="" method="get">
                                  <input type="hidden" name="id_compte" value="<?=$empRecord['id']?>">
                                  <button type="submit" name="edit" class="btn btn-primary"><div class="bi bi-pencil"></div></button>
                              </form>
                        </div>
                        <div class="col-md-6">
                          <form action="" method="get" onsubmit="return confirm('Voulez-vous supprimer le compte?');">
                               <input type="hidden" name='id_compte' value="<?=$empRecord['id']?>">
                               <button type="submit" name="dellet" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                          </form>
                    </div>
                      </div>
                    </td>
                  </tr>
                  <?php endwhile ?>
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <div class="card-title">        
                </div>
                <form method="get" action="controler/adduser.php">
                 <input type="hidden" name="id_user" value="<?=$id_user?>">
                <div class="row mb-3">
                  <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                  <div class="col-sm-8">
                    <input type="text" name="nom" value="<?=$nom?>" class="form-control" id="nom">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="login" class="col-sm-3 col-form-label">Login</label>
                  <div class="col-sm-8">
                    <input type="text"  name="login" value="<?=$login?>" class="form-control" id="login">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="pwd" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-8">
                    <input type="text" name="pwd" value="<?=$pwd?>" class="form-control" id="pwd">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="type_compte" class="col-sm-3 col-form-label">Type compte</label>
                    <div class="col-sm-8">
                      <select   name="type_compte" class="form-select" id="type_compte" aria-label="Default select example">
                        <option selected="">Selectionez le type de compte</option>
                        <option value="simple">simple</option>
                        <option value="administrateur">admin</option>
                        <option value="chauffeur">chauffeur</option>
                      </select>
                    </div>
                </div>
                <div class="row mb-3">
                  <label for="Adresse" class="col-sm-3 col-form-label">Adresse</label>
                  <div class="col-sm-8">
                    <input type="text" name="adresse" value="<?=$adresse?>" class="form-control" id="Adresse">
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-lg-3">
                          
                      </div>
                      <div class="col-lg-3">
                          
                      </div>
                      <div class="col-lg-3">
                        <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
                      </div>
                      
                      <div class="col-lg-3">
                        <button type="submit" name="edit" class="btn btn-success">Modifier</button>
                      </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
          
          </div>
      </div>
    </div>
   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- vendor js -->
<?php
    include 'include/vendojs.php';
 ?>

</body>

</html>