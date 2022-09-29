<?php
  
  include 'controler/config.php';  
  $empQuery = "SELECT * FROM poubelle";	
  $resultData = mysqli_query($conn, $empQuery);
  $empData = array();
  $i = 0;
   
  if(isset($_GET['dellet']))
  {
    $id = $_GET['ref']; 
    
    $empQuery = "DELETE FROM `contrats` WHERE Ref = $id";	
    $resultData = mysqli_query($conn, $empQuery);
    
  }
  function getData($sqlQuery) {
    include 'controler/config.php';
    $result = mysqli_query($conn, $sqlQuery);
    if(!$result){
        die('Error in query: '. mysqli_error());
    }
    $data= array();
    
    while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
        $data[]=$row;            
    }
    return $data;
  }

  function getname($sqlQuery) {
    include 'controler/config.php';
		$result = mysqli_query($conn, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
    $row = $result -> fetch_array(MYSQLI_ASSOC);

		return $row['nom'];
	}


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
        <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-6 " style="margin-left: 20px;">
                       <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Editer contrat</button>
                          <!-- Vertically centered Modal -->
              <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Vertically Centered</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" method="get" action="controler/contrat.php">
                            <div class="col-md-4">
                              <label for="dated" class="form-label">Date debut</label>
                              <input type="date" class="form-control" name="date_debut" id="dated" value="John" required="">
                            </div>
                            <div class="col-md-4">
                              <label for="datef" class="form-label">Date fin</label>
                              <input type="date" class="form-control" name="date_fin" id="datef" value="Doe" required="">
                            </div>
                            <div class="col-md-4">
                              <label for="ref" class="form-label">Reference</label>
                              <div class="input-group">
                                <span class="input-group-text" id="ref">@</span>
                                <input type="text" class="form-control" name="Ref"  id="ref" aria-describedby="inputGroupPrepend2" required="">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label for="client" class="form-label">Client</label>
                              <select class="form-select" name="client" id="client" required="">
                                <option selected="" disabled="" value="">Choose...</option>
                                <?php foreach (getData("SELECT * FROM login") as  $i) :?>
                                    <option value="<?=$i['id']?>"><?=$i['nom']?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label for="poubelle" class="form-label">Poubelle</label>
                              <select class="form-select" name="poubelle" id="poubelle"  required="">
                                <option selected="" disabled="" value="">Choose...</option>
                                <?php foreach (getData("SELECT * FROM n_poubelle") as  $i) :?>
                                <option value="<?=$i['code']?>"><?=$i['code']?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label for="validationDefaultUsername" class="form-label">type contrat</label>
                              <div class="input-group">
                                <input type="text" class="form-control" name="type_contrat"  id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required="">
                              </div>
                            </div> 
                            <div class="col-md-4">
                              <label for="des" class="form-label">Description</label>
                              <textarea name="description" id="des" cols="49" rows="3">

                              </textarea>
                            </div>         
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                      <button class="btn btn-primary" name="insert" type="submit">Valider</button>                    
                    </form>
                    </div>
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->
                    </div>
                </div>    
            </div>
            <div class="card-body">
                
              <h5 class="card-title">Liste des Contrats</h5>
              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type de contrat</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date debut</th>
                    <th scope="col">Date fin</th>
                    <th scope="col">Reference</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $j = 0 ?>
                <?php foreach (getData("SELECT * FROM `contrats`") as  $i) :?>
                  <tr>  
                    <th scope="row"><?=$j = $j+1?></th>
                    <td><?=$i['type_contrat']?></td>
              
                    <a href="http://"><td><a><?=getname("SELECT nom FROM `login` WHERE id =  ".$i['login']."")?></a></td></a>
                    <td><?=$i['date_Debut']?></td>
                    <td><?=$i['date_Fin']?></td>
                    <td><?=$i['Ref']?></td>
                    <td>
                      <div class="row">
                        <div class="col-md-6">
                              <form action="" method="get">
                                  <input type="hidden" name="ref" value="<?=$i['Ref']?>">
                                  <button type="submit" name="edit" class="btn btn-primary"><div class="bi bi-pencil-square"></div></button>
                              </form>
                        </div>
                        <div class="col-md-6">
                          <form action="" method="get" onsubmit="return confirm('Voulez-vous supprimer le contrat?');">
                               <input type="hidden" name='ref' value="<?=$i['Ref']?>">
                               <button type="submit" name="dellet" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                          </form>
                    </div>
                      </div>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

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