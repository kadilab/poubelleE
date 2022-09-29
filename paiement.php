<?php
// SELECT date,Ref,Description,poids,niveau FROM `paiement` AS pa ,prelevement AS pr WHERE pa.id_prelevement = pr.id_prelevement;
// INSERT INTO `paiement` (`id_paiement`, `date`, `Ref`, `Description`, `Montant`, `id_prelevement`) VALUES (NULL, current_timestamp(), 'oo90', 'dfdfd', '1000', '2');
?>

<?php
  
  include 'controler/config.php';  


  if (isset($_GET['dellet'])) {
      $id = $_GET['id'];
      $query = "DELETE FROM `paiements` WHERE id = $id";
      $resultData = mysqli_query($conn, $query);

      var_dump($resultData);
  }


  $empQuery = "SELECT *FROM paiements, n_poubelle,historique_prelevement WHERE paiements.id_historique = historique_prelevement.id AND historique_prelevement.code_poubelle = n_poubelle.code";	
  $resultData = mysqli_query($conn, $empQuery);
  $empData = array();
  $i = 0;

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
                       <!-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verticalycentered">Historique de payme</button> -->
                          <!-- Vertically centered Modal -->

             
                    </div>
                </div>    
            </div>
            <div class="card-body">
                
              <h5 class="card-title">Historique  des transaction</h5>
              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>          
                    <th scope="col">Date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Poids</th>
                    <th scope="col">Montant</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $j = 0 ?>
                <?php foreach (getData("SELECT *FROM paiements, n_poubelle,historique_prelevement,contrats  WHERE paiements.id_historique = historique_prelevement.id AND historique_prelevement.code_poubelle = n_poubelle.code AND contrats.code_poubelle = n_poubelle.code") as  $i) :?>
                  <tr>
                    <th scope="row"><?=$j = $j+1?></th>
                    <a href="http://"><td><?=$i['date']?></td></a>
                    <td><?=$i['Description']?></td>
                    <td><?=$i['Poids']?></td>
                    <td><?=$i['montant']?>$</td>  
                    <td>
                      <div class="row">
                   
                        <div class="col-md-6">
                          <form action="" method="get" onsubmit="return confirm('Voulez-vous supprimer cette transaction?');">
                               <input type="hidden" name='id' value="<?=$i['id']?>">
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