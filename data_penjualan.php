<?php
header('Content-Type: application/json');

$host     = "localhost";
$username = "root";
$password = "";
$database = "naradita"; 

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die(json_encode(array("error" => "Koneksi ke database gagal: " . mysqli_connect_error())));
}

$query  = "SELECT tahun, SUM(total_penjualan) AS total_penjualan 
           FROM penjualan_tahunan 
           WHERE tahun BETWEEN 2017 AND 2026 
           GROUP BY tahun 
           ORDER BY tahun ASC";

$result = mysqli_query($koneksi, $query);

$data = array();
if ($result) {
    foreach ($result as $row) {
        $data[] = array(
            "tahun" => (int)$row['tahun'],
            "total_penjualan" => (int)$row['total_penjualan']
        );
    }
}

echo json_encode($data);

mysqli_close($koneksi);
?>