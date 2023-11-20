<?php
    header('Content-type: application/json; charset=utf-8');
    $conn = include "conn.php";

    if(isset($_POST['Id']) && isset($_POST['Name']) && isset($_POST['Address'])){
        $id = $_POST['Id'];
        $Name= $_POST['Name']; 
        $Address = $_POST['Address' ];

    $q=mysqli_query($conn,"UPDATE mahasiswa SET Name='$Name', Address='$Address' WHERE Id='$Id'"); 
    $response = array() ;

    if($q){
        $response["success"] = 1; 
        $response["message"] = "Data berhasil diupdate";
        echo json_encode($response);
    }
    else{
        $response["success"] = 0;
        $response["message"] = "Data gagal diupdate";
        echo json_encode($response);
    }
}
else{
    $response["success"] = -1; 
    $response["message"] = "Data kosong";
    echo json_encode($response);
}
?>