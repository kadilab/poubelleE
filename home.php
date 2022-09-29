<?php
  
  // poubelle ,contrat , utilisateur
   function getNb($sqlQuery) {
    include 'controler/config.php';
		$result = mysqli_query($conn, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
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

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Poubelle(s)</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-trash"></i>
                                        </div>
                                        <div class="ps-2">
                                            <h6><?=getNb("SELECT * FROM `n_poubelle`")?></h6>
                                            <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Contrat(s)</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-journal-text"></i>
                                        </div>
                                        <div class="ps-2">
                                            <h6><?=getNb("SELECT * FROM `contrats`")?></h6>
                                            <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Utilisateur(s)</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-journal-text"></i>
                                        </div>
                                        <div class="ps-2">
                                            <h6><?=getNb("SELECT * FROM `login`")?></h6>
                                            <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Left side columns -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Etat<span>| Poubelle</span></h5>

                            <div
                                class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                <div class="dataTable-top">
                               
                                  
                                </div>
                                <?php
                                     include 'controler/config.php';
                                     $r = "SELECT * FROM poubelle_data,contrats,login WHERE poubelle_data.code_poubelle = contrats.code_poubelle AND contrats.login = login.id";
                                     $rst = $result = mysqli_query($conn, $r);
                                 
                                     $i = 0;
                                ?>
                                <div class="dataTable-container">
                                    <table class="table table-borderless datatable dataTable-table">
                                        <thead>
                                            <tr>
                                                <th scope="col" data-sortable="" style="width: 13.8322%;">
                                                    <a href="#" class="dataTable-sorter">#</a>
                                                </th>
                                                <th scope="col" data-sortable="" style="width: 23.1293%;">
                                                    <a href="#" class="dataTable-sorter">Poubelle</a>
                                                </th>
                                                <th scope="col" data-sortable="" style="width: 31.5193%;">
                                                    <a href="#" class="dataTable-sorter">Adresse</a>
                                                </th>                                       
                                                <th scope="col" data-sortable="" style="width: 19.0476%;">
                                                    <a href="#" class="dataTable-sorter">Status</a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   while($data = mysqli_fetch_assoc($rst)): $i++;?>
                                            <tr>
                                                <th scope="row">
                                                    <a href="#"><?=$i?></a>
                                                </th>
                                                <td><?=$data['code_poubelle']?></td>
                                                <td><a href="#" class="text-primary"><?=$data['adresse']?></a></td>
                                                <td><span class="badge bg-success">Approved</span></td>
                                            </tr>
                                            <?php endwhile ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="dataTable-bottom">
                                    <div class="dataTable-info">.....................</div>
                                    <nav class="dataTable-pagination">
                                        <ul class="dataTable-pagination-list"></ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </section>

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