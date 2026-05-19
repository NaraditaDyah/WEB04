<?php
$host     = "localhost";
$username = "root";
$password = "";
$database = "naradita"; 

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

    $query = "INSERT INTO pesan (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

    if (mysqli_query($koneksi, $query)) {

        echo "success";
    } else {
        echo "error: " . mysqli_error($koneksi);
    }
}
mysqli_close($koneksi);
?>