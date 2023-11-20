<?php
header('Content-type: application/json; charset=utf-8');
$conn = include "conn.php";
if(isset($_GET['Id'])){
    $id = $_GET['Id'];
    $sql = "DELETE FROM MyGuests WHERE id='$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
else{
    $response["success"] = -1;
    $response["message"] = "Data kosong";
    echo "\nData kosong";
}

?>