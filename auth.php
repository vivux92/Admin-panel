<?php
require_once "conn.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// echo "<pre>";
// print_r($_POST);
// exit(' CALL');
    $email      = $_POST['email'] ?? '';
    $password   = $_POST['password'] ?? '';
    $product_id = $_POST['product_id'] ?? '';


    $sql    = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    $data   = [];

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (isset($data['role_id']) && $data['role_id'] == '2') {
            if (password_verify($password, $data['passward'])) {
                $_SESSION['user_id'] = $data['id'];
                if ($product_id) {
                    header("location:product_detail.php?id=$product_id");
                } else {
                    header("location:home.php");
                }
            } else {
                echo "<div class='alert alert-danger'>Invalid email and password.</div>";
            }
        }
    } else {
        $newpassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email,passward)
        VALUES('$email','$newpassword')";

        if (mysqli_query($con, $sql)) {
            $user_id = mysqli_insert_id($con);
            $_SESSION['user_id'] = $user_id;
            if ($product_id) {

                header("location:product_detail.php?id=$product_id");
            } else {
                header("location:home.php");
            }
        }
    }
}
