<?php
$kecamatan = $_POST['kecamatan'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$luas = $_POST['luas'];
$status = $_POST['status'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menggunakan nama tabel 'penduduk' agar tidak error
$sql = "INSERT INTO penduduk (kecamatan, longitude, latitude, luas, status)
VALUES ('$kecamatan', $longitude, $latitude, $luas, '$status')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>