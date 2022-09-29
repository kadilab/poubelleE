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
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Mes factures</h5>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Poids</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Etat</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>2022-09-22</td>
                    <td>2.3kg</td>
                    <td>28$</td>
                    <td><span class="badge rounded-pill bg-danger">Non payer</span></td>
                    <td>
                        <form action="" method="post">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-bank"></i>
                            </button>
                        </form>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
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