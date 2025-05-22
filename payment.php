<?php
require_once 'vendor/autoload.php';
require_once "conn.php";
\Stripe\Stripe::setApiKey('sk_test_51QabTTAQrYzPtwf93ThRvT3jcbkFIz0ozb1aYIn8wxri5Q0c8AWkD2KsaeIKduj9ekqjfsAhE5CPd21wBATDxEnH00WV1XEoMb');
// echo "<pre>";
// print_r($_POST);
// exit(' CALL');
$amount       = $_POST['amount'];
$product_name = $_POST['product_name'];
$user_id      = $_POST['user_id'];
$product_id   = $_POST['product_id'];

$charge = \Stripe\Charge::create([
    'source' => $_POST['stripeToken'],
    'description' => $product_name,
    'amount' => $amount * 100,
    'currency' => 'inr',
]);
$balance_transaction = $charge['balance_transaction'];
$status = $charge['status'];

// echo "<pre>";
// print_r($balance_transaction);
// exit(' CALL');
$sql = "INSERT INTO ordered (user_id,product_id,transaction_id,price,product_name,order_status)
VALUES ('$user_id','$product_id','$balance_transaction','$amount','$product_name','$status')";
// echo "<pre>";
// print_r($sql);
// exit(' CALL');
mysqli_query($con,$sql);

echo "<pre>";
print_r($charge);
exit(' CALL');
?>
