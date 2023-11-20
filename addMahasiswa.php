<?php
header('Content-type:application/json;charset=utf-8'); 
$conn = include "conn.php";

if(isset($_POST['Name']) && isset($_POST['Address'])){
    $Name = $_POST['Name'];
    $alamat = $_POST['Address'];

    $q=mysqli_query($conn,"INSERT INTO mahasiswa(Name, Address) VALUES ('$Name', '$Address')"); 
    $response = array();

    if($q){
        $response["success"] = 1;
        $response["message"] = "Data berhasil ditambah"; 
        echo json_encode($response);
    }
    else{
        $response["success"] = 0;
        $response["message"] = "Data gagal ditambah";
        echo json_encode($response);
    }
}
else{
    $response["success"] = -1;
    $response["message"] = "Data kosong";
    echo "\nData kosong";
}
