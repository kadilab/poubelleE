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
                                    <!-- Vertically centered Modal -->
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
                                        <th scope="col">Etat</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $j = 0 ?>
                                    <?php foreach (getData("SELECT * FROM `contrats`") as  $i) :?>
                                    <tr>
                                        <th scope="row"><?=$j = $j+1?></th>
                                        <td><?=$i['type_contrat']?></td>
                                        <td><?=$i['Description']?></td></a>
                                        <td><?=$i['date_Debut']?></td>
                                        <td><?=$i['date_Fin']?></td>
                                        <td>
                                        <span class="badge rounded-pill bg-danger">Non signer</span>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="" method="get">
                                                        <input type="hidden" name="ref" value="<?=$i['Ref']?>">
                                                        <button type="submit" name="edit" class="btn">
                                                            <div class="bi bi-pencil-square text-success"></div>
                                                        </button>
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


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- vendor js -->
    <?php
    include 'include/vendojs.php';
 ?>

</body>

</html>