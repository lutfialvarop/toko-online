<?php 
include '../conn.php';
require '../Function.php';

function hapus($id){
    global $conn;
    
    $result = query($conn, "SELECT * FROM db_barang WHERE id = $id");
    unlink('../img/' . $result['gambar']);

    mysqli_query($conn, "DELETE FROM db_barang WHERE id = '$id'") or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function tambah($input){
    global $conn;

    $nama_barang = htmlspecialchars($input['nama_barang']);
    $deskripsi = htmlspecialchars($input['deskripsi']);
    $harga = htmlspecialchars($input['harga']);
    $gambar = $_FILES['gambar']['name'];

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO db_barang
                VALUES ('', '$nama_barang', '$deskripsi', '$harga', '$gambar')";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $id = ($data['id']);
    $nama_barang = htmlspecialchars($data['nama_barang']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $harga = htmlspecialchars($data['harga']);
    $gambarlama = htmlspecialchars($data['gambarlama']);

    if ($_FILES['gambar']['error'] == 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE db_barang SET
                nama_barang = '$nama_barang',
                deskripsi = '$deskripsi',
                harga ='$harga',
                gambar = '$gambar'
                WHERE id = '$id'
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// End

// Function Upload
function upload(){
    $namafile = $_FILES['gambar']['name'];
    $tipefile = $_FILES['gambar']['type'];
    $sizefile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $location = $_FILES['gambar']['tmp_name'];

    if ($error == 4) {
        echo "
        <script>
            alert('Pilih Gambar Terlebih Dahulu');
        </script>
        ";
        return false;
    }

    // Cek Ekstensi File
    $ekstensifilevalid = ['jpg', 'jpeg', 'png'];
    $ekstensifile = explode('.', $namafile);
    $ekstensifile = strtolower(end($ekstensifile));
    if (!in_array($ekstensifile, $ekstensifilevalid)) {
        echo "
        <script>
            alert('Yang Anda Upload Bukan Gambar');
        </script>
        ";
        return false;
    }
    // Cek Type File
    if ($tipefile != 'image/jpeg' && $tipefile != 'image/png') {
        echo "
        <script>
            alert('Yang Anda Upload Bukan Gambar');
        </script>
        ";
        return false;
    }

    if ($sizefile > 2621440) {
        echo "
        <script>
            alert('Ukuran Gambar Terlalu Besar');
        </script>
        ";
        return false;
    }
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensifile;

    move_uploaded_file($location, '../img/' . $namafilebaru);

    return $namafilebaru;
}
// End

// Function Tambah
function signup_admin($data){
    global $conn;

    $nama_admin = htmlspecialchars(strtolower(stripslashes($data["nama_admin"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $pass2 = mysqli_real_escape_string($conn, $data["pass2"]);

    $result = mysqli_query($conn, "SELECT nama_admin FROM db_admin WHERE nama_admin = '$nama_admin'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Nama Sudah Ada');
            </script>";
        return false;
    }

    if ($password != $pass2) {
        echo "
                <script>
                    alert('Password Tidak Sesuai');
                </script>
            ";
        return false;
    }

    // Enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambah Database
    mysqli_query($conn, "INSERT INTO db_admin VALUES ('', '$nama_admin', '$password')");

    return mysqli_affected_rows($conn);
}
// End

?>