<?php
include_once "./layout/front/header.php";
require_once "conn.php";
$product_id = $_GET['id'] ?? '';
$sql = "SELECT * FROM cart";
$result = mysqli_query($con, $sql);
$data = [];

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
}
if ($product_id) {
    $sql    = "SELECT * FROM product WHERE id='$product_id'";
    $result = mysqli_query($con, $sql);
    $data   = [];

    if (mysqli_num_rows($result) > 0) {
        $product_data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $product_name = $product_data['name'];
        $price        = $product_data['price'];
        $login_id     = $_SESSION['user_id'];

        $sql    = "SELECT * FROM cart WHERE product_id='$product_id' AND user_id = $login_id";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $data['image'] = $product_data['image'] ?? '';
        } else {
            $sql = "DELETE FROM cart WHERE user_id = $login_id";
            mysqli_query($con, $sql);

            $sql = "INSERT INTO cart (user_id,product_id,product_name,price) VALUES ('$login_id','$product_id','$product_name','$price')";
            mysqli_query($con, $sql);
            $data['id']           = mysqli_insert_id($con);
            $data['user_id']      = $login_id;
            $data['product_id']   = $product_id;
            $data['product_name'] = $product_name;
            $data['price']        = $price;
            $data['image']        = $product_data['image'] ?? '';
        }
    }
}

?>
<div class="container mt-5 mb-5">
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="upload/<?php echo $data['image'] ?? '' ?>" alt="" srcset="" width="100px"></td>
                    <td><?php echo $data['product_name'] ?? '' ?></td>
                    <td>Rs. <?php echo $data['price'] ?? '' ?></td>
                </tr>

            </tbody>
        </table>


    </div>
    <div class="row text-center">
        <form action="payment.php" method="POST">
            <input type="hidden" name="amount" value="<?php echo $data['price'] ?>">
            <input type="hidden" name="product_name" value="<?php echo $data['product_name'] ?>">
            <input type="hidden" name="user_id" value="<?php echo $data['user_id']?>">
            <input type="hidden" name="product_id" value="<?php echo $data['product_id']?>">
            <script
                src="https://checkout.stripe.com/checkout.js"
                class="stripe-button"
                data-key="pk_test_51QabTTAQrYzPtwf99UrkKQb296uTZjHWlwuXyHWXZk5AdlyCu3CLRFwEvetfti422PkSHchIMHoCy8ZhMhzWxu0x000Cr8Dx59"
                data-name="Cotton T-shirt"
                data-description="<?php echo $data['product_name'] ?>"
                data-amount="<?php echo $data['price'] * 100 ?>"
                data-currency="inr"
                data-label="Paynow">
            </script>
        </form>
        <!-- <a href="" class="btn btn-success ml-3">Buy Now</a> -->
    </div>
</div>
<?php
include_once "./layout/front/footer.php";
?>