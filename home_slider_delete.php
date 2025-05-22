<?php 
require_once "conn.php";

$id = $_GET['id'] ?? '';
if($id){
    $sql = "DELETE FROM home_slider WHERE id='$id'";
    if(mysqli_query($con,$sql)){
        header("Location:home_slider.php");
    }
}
?>