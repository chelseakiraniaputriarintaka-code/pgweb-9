<?php
$id = $_POST['id'];
$kecamatan = $_POST['kecamatan'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$luas = $_POST['luas'];
$status = $_POST['status'];

$conn = new mysqli("localhost", "root", "", "latihan");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Menggunakan nama tabel 'penduduk' agar tidak error
$sql = "UPDATE penduduk SET 
        kecamatan='$kecamatan', 
        longitude=$longitude, 
        latitude=$latitude, 
        luas=$luas, 
        status='$status' 
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>