<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Sarana Prasarana Kemantren</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            display: inline-block;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        a.action-link {
            text-decoration: none;
            color: blue;
            display: block;
            margin-bottom: 2px;
        }
        a.action-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <a href='input/index.html' style="text-decoration: none; color: purple; margin-bottom: 10px; display: inline-block;">Input</a>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr>
    <th>Kecamatan</th>
    <th>Longitude</th>
    <th>Latitude</th>
    <th>Luas</th>
    <th>Status Fasilitas</th>
    <th>Aksi</th></tr>"; 

    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["kecamatan"]."</td>
        <td>".$row["longitude"]."</td>
        <td>".$row["latitude"]."</td>
        <td align='right'>".$row["luas"]."</td>
        <td align='right'>".$row["status"]."</td>
        <td>
            <a class='action-link' href='delete.php?id=".$row["id"]."' onclick=\"return confirm('Yakin hapus data ini?')\">hapus</a>
            <a class='action-link' href='edit/index.php?id=".$row["id"]."'>edit</a>
        </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "<p>0 results</p>";
}

$conn->close();
?>
</div>

</body>
</html>