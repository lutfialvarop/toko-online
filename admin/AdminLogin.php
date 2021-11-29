<?php
require '../function.php';

if (isset($_COOKIE['id-admin']) && isset($_COOKIE['key-admin'])) {
    $id = $_COOKIE['id-admin'];
    $key = $_COOKIE['key-admin'];

    $result = mysqli_query($conn, "SELECT nama_admin FROM db_admin WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    if ($key == hash('sha256', $row['nama_admin'])) {
        $_COOKIE['login'] = true;
    }
}

if (isset($_COOKIE["login"])) {
    header("Location: Admin.php");
    exit;
}

if (isset($_POST["login"])) {

    $nama = $_POST["nama"];
    $pass = $_POST["pass"];
    
    $result1 = mysqli_query($conn, "SELECT * FROM db_admin WHERE nama_admin = '$nama'");

    if (mysqli_num_rows($result1) === 1) {
        $row1 = mysqli_fetch_assoc($result1);
        
        if (password_verify($pass, $row1["password"])) {

            setcookie('id-admin', $row1['id'], time() + 60*60*24);
            setcookie('key-admin', hash('sha256', $row1['nama_admin']), time() + 60*60*24);
            header("Location: Admin.php");
            exit;
        } 
        $error = true;
    }
}
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

        <!-- Link -->
        <link rel="stylesheet" href="../style.css">

        <title>Login Admin || Vote</title>
    </head>
    <body>
        <?php if(isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                Nama Atau Password Salah
            </div>
        <?php endif; ?>
        <section class="position-absolute top-50 start-50 translate-middle" id="login">
            <h1 class="pb-5">Login Admin</h1>
            <!-- Row -->
            <div class="row">
                <!-- col Login -->
                <div class="col pb-3">
                    <div class="card border border-dark border-3 bg-dark text-light" style="width: 18rem;">
                        <div class="card-body">
                            <!-- Form -->
                            <form action="" method="post">
                                <!-- Nama -->
                                <div class="col pb-2">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" required>
                                </div>
                                <!-- End -->

                                <!-- Pass -->
                                <div class="col pb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="pass" id="password" required>
                                </div>
                                <!-- End -->

                                <!-- Login Button -->
                                <div class="d-flex bd-highlight">
                                    <button class="btn btn-success text-light me-auto p-2 bd-highlight" name="login" type="submit">
                                        Login Admin
                                    </button>
                                    <!-- <a class="p-2 bd-highlight link-light" href="AdminSignup.php">Daftar</a> -->
                                </div>
                                <!-- End -->
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
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