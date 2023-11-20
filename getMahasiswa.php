<?php
header('Content-type: application/json; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "umnsi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$query = "SELECT * FROM mahasiswa";
$q = mysqli_query($conn, $query);
$response = array();

if (mysqli_num_rows($q) > 0) {
    $response['data'] = array();
    while ($r = mysqli_fetch_array($q)) {
        $mahasiswa["Id"] = $r["Id"];
        $mahasiswa["Name"] = $r["Name"];
        $mahasiswa["Address"] = $r["Address"];
        array_push($response['data'], $mahasiswa);
    }

    $response["success"] = 1;
    $response["Message"] = "Data Mahasiswa berhasil dibacah";
} else {
    $response["success"] = 0;
    $response["message"] = "Tidak ada data";
}

echo "\n", json_encode($response), "\n";

$conn->close();
