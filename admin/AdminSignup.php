<?php 

require 'FunctionAdmin.php';

if (isset($_POST["signup"])) {
    if (signup_admin($_POST) > 0) {
        echo "
            <script>
                alert('Admin Berhasil Ditambahkan');
                document.location.href = 'AdminLogin.php';
            </script>
        ";
    } else {
        echo mysqli_error($conn);
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

        <title>Signup Admin || Vote</title>
    </head>
    <body>
        <section class="position-absolute top-50 start-50 translate-middle" id="signup">
            <h1 class="pb-5">Signup Admin</h1>
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
                                    <input type="text" class="form-control" name="nama_admin" id="nama" required>
                                </div>
                                <!-- End -->

                                <!-- Pass -->
                                <div class="col pb-2">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                                <!-- End -->

                                <!-- Pass 2 -->
                                <div class="col pb-3">
                                    <label for="password2" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="pass2" id="password2" required>
                                </div>
                                <!-- End -->
                                <button class="btn btn-secondary text-light" name="signup" type="submit">Signup Admin</button>
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