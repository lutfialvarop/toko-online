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
                <div class="container">
                    <!-- Navbar Item -->
                    <a class="navbar-brand">Toko "Isi Sendiri"</a>
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

        <section id="home">
            <div class="mt-4 p-5 rounded">
                <div class="row">
                    <div class="col text-center">
                        <h1>Selamat Datang</h1>
                    </div>
                </div>
            </div>
            <svg style="background-color: #ffffff;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#e2edff" fill-opacity="1" d="M0,32L40,37.3C80,43,160,53,240,74.7C320,96,400,128,480,138.7C560,149,640,139,720,133.3C800,128,880,128,960,133.3C1040,139,1120,149,1200,149.3C1280,149,1360,139,1400,133.3L1440,128L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
            </svg>
        </section>
        
        <section id="product" style="background-color: #ffffff;">
            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <h1>Product</h1>
                    </div>
                </div>
                <div class="row">
                    <?php $no = 1; ?>
                    <?php foreach ($rows as $data) : ?>
                    <div class="col">
                            <a class="btn streatched-link" href="aaaa.aa">
                                <div class="card shadow" style="width: 10rem;">
                                    <img src="../img/<?= $data['gambar']; ?>" alt="" class="cars-img-top" height="100">
                                    <div class="card-body">
                                        <p class="card-text"><?= $data['nama_barang']; ?></p>
                                        <p class="card-text">Rp.<?= $data['harga']; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php $no++; ?>
                        <?php endforeach; ?>
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