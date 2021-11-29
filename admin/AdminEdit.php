<?php 
    include 'FunctionAdmin.php';

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

    $id = $_GET["id"];

    $data = query("SELECT * FROM db_barang WHERE id = $id")[0];

    if( isset($_POST["submit"]) ) {
        if ( ubah($_POST) > 0 ) {
            echo "
                <script>
                    alert('Data Berhasil Diubah');
                    document.location.href = 'Admin.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Diubah');
                    document.location.href = 'Admin.php';
                </script>
            ";
        }
    };
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

    <title>Admin || Toko Online</title>
	</head>
	<body>

        <section id="kosong">
            <div class="mt-4 p-5 text-white rounded">
                <form class="row g-3 text-dark shadow my-3 px-3 py-3 rounded" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="col-md-4">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <textarea type="text" name="nama_barang" class="form-control" id="nama_barang" style="min-height: auto;" maxlength="250" autocomplete="" required><?= $data['nama_barang']; ?></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga" value="<?= $data['harga']; ?>" min="0" max="9999999999" required>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" name="gambarlama" value="<?= $data['gambar']; ?>">
                        <label for="foto" class="form-label">Foto</label>
                        <img src="../img/<?= $data['gambar']; ?>" width="50" height="50" class="img-preview">
                        <input type="file" name="gambar" class="form-control gambar" id="foto" onchange="previewImage()">
                    </div>
                    <div class="col-12">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea type="text" name="deskripsi" class="form-control" id="deskripsi" maxlength="255" style="min-height: auto;" autocomplete=""><?= $data['deskripsi']; ?></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary">Edit Barang</button>
                        <button type="submit" name="cancel" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </section>

        <div class="container">
            <div class="text-center">

            </div>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script src="js/script.js"></script>
  </body>
</html>