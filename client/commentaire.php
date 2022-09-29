<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'include/style.php';
  ?>
</head>

<body>
    <?php
    include 'include/header.php';
     include 'include/aside.php';
  ?>

    <!-- End Sidebar-->

    <main id="main" class="main">
        <textarea class="form-control" placeholder="Entrez votre commentaire ici" id="floatingTextarea"
            style="height: 90px;">
        </textarea>
        <div class="row">
            <div class="col-md-9">

            </div>

            <button class="btn btn-primary my-3">Envoyer commentaire</button>


        </div>
        <div class="row my-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-success">Date : 2022-03-09</h5>
                        <p class="text-secondary">
                            votre service est un bon service qui ne servira a rien
                        </p>
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