<?php
include_once "./layout/front/header.php";
require_once "conn.php";
$id = $_GET['id'] ?? '';
if ($id) {
    $sql = "SELECT * FROM product WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    $data = [];
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
}
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <!-- Left Side - Image -->
        <div class="col-md-6">
            <img src="./upload/<?php echo $data['image'] ?? '' ?>" class="img-fluid" alt="Detail Image">
        </div>
        <!-- Right Side - Content -->
        <div class="col-md-6">
            <h2><?php echo $data['name'] ?? '' ?></h2>
            <p><?php echo $data['description'] ?? '' ?></p>

            <h2 class="mt-2">Additional Information</h2>
            <ul>
                <li><?php echo $data['additional_description'] ?? '' ?></li>
            </ul>

            <h2 class="mt-2">Price</h2>
            <ul>
                <li><?php echo $data['price'] ?? '' ?></li>
            </ul>

            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id']) { ?>
                <a href="cart.php?id=<?php echo $data['id'] ?? '' ?> " class="btn btn-warning"> Add to cart</a>

            <?php  } else { ?>
                <button type="button" class="btn btn-primary add_to_cart" data-toggle="modal" data-id="<?php echo $data['id'] ?? '' ?>" data-target="#exampleModal">
                    Add to cart
                </button>
            <?php } ?>
        </div>
    </div>
</div>
<?php
include_once "./layout/front/footer.php";
?>