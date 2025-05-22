<?php
include_once "./layout/front/header.php";
require_once "conn.php";
$sql = "SELECT * FROM product";
$result = mysqli_query($con, $sql);
$data = [];
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<div class="brand_color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>our product</h2>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- our product -->
<div class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <span>We package the products with best services to make you a happy customer.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-bg">
    <div class="product-bg-white">
        <div class="container">
            <div class="row">
                <?php
                if ($data && count($data)) :
                    foreach ($data as $key => $product) :
                ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <a href="product_detail.php?id=<?= $product['id'] ?? ''?>">
                                <div class="product-box">
                                    <i><img src="./upload/<?php echo $product['image'] ?>" /></i>
                                    <h3><?php echo $product['description'] ?? ''?></h3>
                                    <span><?php echo $product['price'] ?? ''?></span>
                                </div>
                            </a>
                        </div>
                <?php
                    endforeach;
                endif; ?>
                <!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <a href="product_detail.php">
                        <div class="product-box">
                            <i><img src="icon/p2.png" /></i>
                            <h3>Norton Internet Security</h3>
                            <span>$25.00</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <a href="product_detail.php">
                        <div class="product-box">
                            <i><img src="icon/p3.png" /></i>
                            <h3>Norton Internet Security</h3>
                            <span>$25.00</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <a href="product_detail.php">
                        <div class="product-box">
                            <i><img src="icon/p4.png" /></i>
                            <h3>Norton Internet Security</h3>
                            <span>$25.00</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <a href="product_detail.php">
                        <div class="product-box">
                            <i><img src="icon/p5.png" /></i>
                            <h3>Norton Internet Security</h3>
                            <span>$25.00</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <a href="product_detail.php">
                        <div class="product-box">
                            <i><img src="icon/p2.png" /></i>
                            <h3>Norton Internet Security</h3>
                            <span>$25.00</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <a href="product_detail.php">
                        <div class="product-box">
                            <i><img src="icon/p6.png" /></i>
                            <h3>Norton Internet Security</h3>
                            <span>$25.00</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <a href="product_detail.php">
                        <div class="product-box">
                            <i><img src="icon/p7.png" /></i>
                            <h3>Norton Internet Security</h3>
                            <span>$25.00</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <a href="product_detail.php">
                        <div class="product-box">
                            <i><img src="icon/p6.png" /></i>
                            <h3>Norton Internet Security</h3>
                            <span>$25.00</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <a href="product_detail.php">
                        <div class="product-box">
                            <i><img src="icon/p1.png" /></i>
                            <h3>Norton Internet Security</h3>
                            <span>$25.00</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <a href="product_detail.php">
                        <div class="product-box">
                            <i><img src="icon/p2.png" /></i>
                            <h3>Norton Internet Security</h3>
                            <span>$25.00</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <a href="product_detail.php">
                        <div class="product-box">
                            <i><img src="icon/p4.png" /></i>
                            <h3>Norton Internet Security</h3>
                            <span>$25.00</span>
                        </div>
                    </a>
                </div> -->
            </div>
        </div>
    </div>

    <?php
    include_once "./layout/front/footer.php";
    ?>