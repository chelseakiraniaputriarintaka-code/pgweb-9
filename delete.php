<?php
$id = $_GET['id'];
$conn = new mysqli("localhost", "root", "", "latihan");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menggunakan nama tabel 'penduduk' agar tidak error
$sql = "DELETE FROM penduduk WHERE id = $id";
$conn->query($sql);

$conn->close();
header("Location: index.php");
?>