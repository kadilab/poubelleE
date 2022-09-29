<?php
  
  include 'controler/config.php';


  if(isset($_GET['dellet']))
  {
    $code = $_GET['code']; 
    $empQuery = "DELETE FROM `n_poubelle` WHERE code = '$code'";	
    $resultData = mysqli_query($conn, $empQuery);
    
  }
  
  $empQuery = "SELECT * FROM n_poubelle";	
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
                    <th scope="col">code</th>               
                    <th scope="col">taille</th>                
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($empRecord = mysqli_fetch_assoc($resultData)): $i++;?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$empRecord['code']?></td>
                    <td><?=$empRecord['taille']?></td>                 
                    <td>
                      <div class="row">
                        <div class="col-md-6">
                              <form action="" method="get">
                                  <input type="hidden" name="code" value="<?=$empRecord['code']?>">
                                  <button type="submit" name="edit" class="btn btn-success"><div class="bi bi-pencil"></div></button>
                              </form>
                        </div>
                        <div class="col-md-6">
                          <form action="" method="get">
                               <input type="hidden" name='code' value="<?=$empRecord['code']?>">
                               <button type="submit" name="dellet" class="btn btn-danger"><i class="bi bi-trash"></i></button>
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
                <form action="./controler/poubelle.php" method="get">
                <input type="hidden" value="0">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Code</label>
                  <div class="col-sm-10">
                    <input type="text" name="code" class="form-control" id="inputText">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Taille</label>
                  <div class="col-sm-10">
                    <input type="text" name="taille" class="form-control" id="inputPassword">
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-lg-3">
                      </div>
                      <div class="col-lg-3">
                          
                      </div>
                      <div class="col-lg-3">
                        <button type="submit"  name="add" class="btn btn-primary">Ajouter</button>
                      </div>
                      <div class="col-lg-3">
                        <button type="submit" name="edit" class="btn btn-success">Update</button>                          
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