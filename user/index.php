<?php 
    require 'FunctionUser.php';

    $rows = query("SELECT * FROM db_barang");
?>

<!doctype html>
<html lang="en">
	<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Link Css -->
	<link rel="stylesheet" href="../style.css">

    <title>User || Toko Online</title>
	</head>
	<body>
        <!-- Navbar -->
        <section id="navbar">
            <nav class="navbar fixed-top navbar-expand-lg text-light navbar-dark bg-dark shadow">
                <div class="container-fluid">
                    <!-- Navbar Item -->
                    <a class="navbar-brand">Hallo User</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                            <a class="nav-link" aria-current="page" href="#">Product</a>
                            <a class="nav-link" aria-current="page" href="#">Contact</a>
                        </div>
                    </div>
                    <!-- End Navbar Item -->
                </div>
            </nav>
        </section>
        <!-- End Navbar -->

        <section id="kosong">
            <div class="mt-4 p-5 text-white rounded">
                <div class="row">
                    <div class="col">
                        <h1>Selamat Datang</h1>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="Product">
        <div class="container">
                <div class="row">
                    <div class="col">
                        <?php $no = 1; ?>
                        <?php foreach ($rows as $data) : ?>
                            <a class="btn streatched-link" href="aaaa.aa">
                                <div class="card shadow" style="width: 12rem;">
                                    <img src="../img/<?= $data['gambar']; ?>" alt="" class="cars-img-top" height="100">
                                    <div class="card-body">
                                        <p class="card-text"><?= $data['nama_barang']; ?></p>
                                        <p class="card-text">Rp.<?= $data['harga']; ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                    </div>
                 </div>
            </div>
        </section>
        

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    </body>
</html>