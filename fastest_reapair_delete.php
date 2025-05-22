<?php 
require_once "conn.php";

$id = $_GET['id'] ?? '';
if($id){
    $sql = "DELETE FROM fastest_repair_service WHERE id='$id'";
    if(mysqli_query($con,$sql)){
        header("Location:fastest_repair.php");
    }
}
?>