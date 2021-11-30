<?php 
    require 'FunctionAdmin.php';

    if (isset($_COOKIE['id-admin']) && isset($_COOKIE['key-admin'])) {
        $id = $_COOKIE['id-admin'];
        $key = $_COOKIE['key-admin'];

        $result = mysqli_query($conn, "SELECT nama_admin FROM db_admin WHERE id = '$id'");
        $row = mysqli_fetch_assoc($result);

        if ($key == hash('sha256', $row['nama_admin'])) {
            $_COOKIE['login'] = true;
        }
    }

        if (!isset($_COOKIE['login'])) {
            header("Location: AdminLogin.php");
            exit;
        }

    $rows = query("SELECT * FROM db_barang");
?>

<!doctype html>
<html lang="en">
	<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Link Css -->
	<link rel="stylesheet" href="../style.css">

    <title>Admin || Toko Online</title>
	</head>
	<body>
        <!-- Navbar -->
        <section id="navbar">
            <nav class="navbar fixed-top navbar-expand-lg text-light navbar-dark bg-dark shadow">
                <div class="container">
                    <!-- Navbar Item -->
                    <a class="navbar-brand">Hallo Admin</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                            <a class="nav-link" href="AdminCreate.php">Create</a>
                        </div>
                    </div>
                    <!-- End Navbar Item -->
                </div>
            </nav>
        </section>
        <!-- End Navbar -->

        <!-- Jumbotron -->
        <section id="kosong">
            <div class="mt-4 p-5 text-white">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex bd-highlight">
                                <h2 class="p-2 flex-grow-1 text-dark bd-highlight">Daftar Barang</h2>
                                <!-- Button Logout -->
                                <div class="p-2 bd-highlight">
                                    <button class="btn btn-danger rounded-pill shadow mb-2">
                                        <a class="link-light" href="AdminLogout.php">Logout</a>
                                    </button>
                                </div>
                                <!-- End Button -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Jumbotron -->
        
        <!-- List -->
        <section id="table">
            <div class="table-responsive">
                <table class="table table-sm container">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <!-- Looping List -->
                    <?php $no = 1; ?>
                    <?php foreach ($rows as $data) : ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td style="max-width: 197px;" class="overflow-auto"><?= $data['nama_barang']; ?></td>
                            <td style="max-width: 103px;" class="overflow-auto"><?= $data['harga']; ?></td>
                            <td><img src="../img/<?= $data['gambar']; ?>" width="50" height="50"></td>
                            <td style="max-width:500px;" class="overflow-auto"><?= $data['deskripsi']; ?></td>
                            <td>
                                <div class="btn-group me-2 ">
                                    <a class="nav-link btn btn-sm btn-outline-secondary" href="AdminEdit.php?id=<?= $data['id']; ?>">Edit</a>
                                    <a class="nav-link btn btn-sm btn-outline-secondary" href="AdminHapus.php?id=<?= $data['id']; ?>" onclick="return confirm('Hapus Data!!!')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <?php $no++; ?>
                    <?php endforeach; ?>
                    <!-- End Looping -->
                </table>
            </div>
        </section>
        <!-- End List -->

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