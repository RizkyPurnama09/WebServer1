<?php
header("Content-Type: application/json");

include 'db_config.php';
// Get the posted data
$data = json_decode(file_get_contents("php://input"));

// Validate the data
if (!isset($data->nik) || !isset($data->nama) || !isset($data->alamat) || !isset($data->jk) || !isset($data->agama)) {
    die(json_encode(["error" => "Invalid input"]));
}

$nik = $koneksi->real_escape_string($data->nik);
$nama = $koneksi->real_escape_string($data->nama);
$alamat = $koneksi->real_escape_string($data->alamat);
$jk= $koneksi->real_escape_string($data->jk);
$agama = $koneksi->real_escape_string($data->agama);




$sql = "INSERT INTO warga (nik, nama, alamat, jk, agama) VALUES ('$nik', '$nama', '$alamat', '$jk', '$agama')";

if ($koneksi->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => $koneksi->error]);
}

$koneksi->close();