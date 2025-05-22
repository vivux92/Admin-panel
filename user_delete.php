<?php
require_once "conn.php";

$id = $_GET['id'] ?? '';
if($id){
    $sql = "DELETE FROM users WHERE id='$id'";
    if(mysqli_query($con,$sql)){
        header("Location:users_list.php");
    }
}
?>