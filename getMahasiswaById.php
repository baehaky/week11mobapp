<?php
header('Content-type:application/json;charset=utf-8');
$conn = include "conn.php";

if (isset($_GET['Id'])) {
    $id = $_GET['Id'];


    $q = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE Id='$id'");
    $response = array();

    $response['data'] = array();
    while($r=mysqli_fetch_array($q)){
        $mahasiswa ["Id"] = $r["Id"];
        $mahasiswa ["Name"] = $r["Name"];
        $mahasiswa ["Address"] = $r["Address"];
        array_push($response['data'], $mahasiswa);
    }

    $response["success"] = 1;
    $response["Message"] = "Data Mahasiswa berhasil dibacah";
}
else{
    $response["success"] = 0;
    $response["message"] = "Tidak ada data";
} 
echo json_encode($response);
