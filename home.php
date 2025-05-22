<?php
include_once "./layout/front/header.php";
require_once "conn.php";
$sql    = "SELECT * FROM home_slider WHERE status = '1' ORDER BY RAND() LIMIT 3";
$result = mysqli_query($con, $sql);
$data_slider = [];
if (mysqli_num_rows($result) > 0) {
   $data_slider = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// fastets repair

$sql    = "SELECT * FROM fastest_repair_service WHERE status = '1'  ORDER BY RAND() LIMIT 4";
$result = mysqli_query($con, $sql);
$data_repair = [];
if (mysqli_num_rows($result) > 0) {
   $data_repair = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// service process 

$sql    = "SELECT * FROM service_process WHERE status = '1'  ORDER BY RAND() LIMIT 6";
$result = mysqli_query($con, $sql);
$data_service = [];
if (mysqli_num_rows($result) > 0) {
   $data_service = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// product 

$sql    = "SELECT * FROM product WHERE status = 1";
$result = mysqli_query($con, $sql);
$data_product = [];
if (mysqli_num_rows($result) > 0) {
   $data_product = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<section class="slider_section">
   <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">
      <div class="carousel-inner">
         <?php
         if ($data_slider && count($data_slider) > 0) :
            foreach ($data_slider as $key => $slider) :
         ?>
               <div class="carousel-item <?php echo $key == '0' ? 'active' : '' ?>">
                  <img class="first-slide" src="./upload/<?php echo $slider['banner_img'] ?? '' ?>" alt="First slide">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <h1><?php echo $slider['title_1'] ?? '' ?> <br> <strong class="black_bold"><?php echo $slider['title_2'] ?? '' ?> </strong><br>
                           <strong class="yellow_bold"><?php echo $slider['title_3'] ?? '' ?> </strong>
                        </h1>
                        <p><?php echo $slider['description'] ?? '' ?></p>
                        <a href="<?php echo $slider['button_url'] ?? '' ?>"><?php echo $slider['button_lable'] ?? '' ?></a>
                     </div>
                  </div>
               </div>
         <?php
            endforeach;
         endif;
         ?>

         <!-- <div class="carousel-item">
            <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
            <div class="container">
               <div class="carousel-caption relative">
                  <h1>Our <br> <strong class="black_bold">Latest </strong><br>
                     <strong class="yellow_bold">Product </strong>
                  </h1>
                  <p>It is a long established fact that a r <br>
                     eader will be distracted by the readable content of a page </p>
                  <a href="#">see more Products</a>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <img class="third-slide" src="images/banner2.jpg" alt="Third slide">
            <div class="container">
               <div class="carousel-caption relative">
                  <h1>Our <br> <strong class="black_bold">Latest </strong><br>
                     <strong class="yellow_bold">Product </strong>
                  </h1>
                  <p>It is a long established fact that a r <br>
                     eader will be distracted by the readable content of a page </p>
                  <a href="#">see more Products</a>
               </div>
            </div>
         </div> -->

      </div>
      <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
         <i class='fa fa-angle-right'></i>
      </a>
      <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
         <i class='fa fa-angle-left'></i>
      </a>

   </div>

</section>
<!-- CHOOSE  -->
<div class="whyschose">
   <div class="container">
      <div class="row">
         <div class="col-md-7 offset-md-3">
            <div class="title">
               <h2>Why <strong class="black">choose us</strong></h2>
               <span>Fastest repair service with best price!</span>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="choose_bg">
   <div class="container">
      <div class="white_bg">
         <div class="row">
            <?php
            if ($data_repair && count($data_repair)) :
               foreach ($data_repair as $key => $repair) :
            ?>
                  <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                     <div class="for_box">
                        <i><img src="./upload/<?php echo $repair['image'] ?? '' ?>" /></i>
                        <h3><?php echo $repair['title'] ?? '' ?></h3>
                        <p><?php echo $repair['description'] ?? '' ?></p>
                     </div>
                  </dir>
            <?php endforeach;
            endif; ?>

            <!-- <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
               <div class="for_box">
                  <i><img src="icon/2.png" /></i>
                  <h3>Computer repair</h3>
                  <p>Perspiciatis eos quos totam cum minima autPerspiciatis eos quos</p>
               </div>
            </dir>
            <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
               <div class="for_box">
                  <i><img src="icon/3.png" /></i>
                  <h3>Mobile service</h3>
                  <p>Perspiciatis eos quos totam cum minima autPerspiciatis eos quos</p>
               </div>
            </dir>
            <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
               <div class="for_box">
                  <i><img src="icon/4.png" /></i>
                  <h3>Network solutions</h3>
                  <p>Perspiciatis eos quos totam cum minima autPerspiciatis eos quos</p>
               </div>
            </dir> -->
            <!-- <div class="col-md-12">
               <a class="read-more">Read More</a>
            </div> -->
         </div>
      </div>
   </div>
</div>
<!-- end CHOOSE -->
<!-- service -->
<div class="service">
   <div class="container">
      <div class="row">
         <div class="col-md-8 offset-md-2">
            <div class="title">
               <h2>Service <strong class="black">Process</strong></h2>
               <span>Easy and effective way to get your device repair</span>
            </div>
         </div>
      </div>
      <div class="row">
         <?php
         if ($data_service && count($data_service)) :
            foreach ($data_service as $key => $service) :
         ?>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="service-box">
                     <i><img src="./upload/<?php echo $service['image'] ?? '' ?>" /></i>
                     <h3><?php echo $service['title'] ?? '' ?></h3>
                     <p><?php echo $service['description'] ?? '' ?> </p>
                  </div>
               </div>
         <?php endforeach;
         endif; ?>
         <!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="service-box">
               <i><img src="icon/service2.png" /></i>
               <h3>Secure payments</h3>
               <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="service-box">
               <i><img src="icon/service3.png" /></i>
               <h3>Expert team</h3>
               <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="service-box">
               <i><img src="icon/service4.png" /></i>
               <h3>Affordable services</h3>
               <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="service-box">
               <i><img src="icon/service5.png" /></i>
               <h3>90 Days warranty</h3>
               <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
            </div>
         </div> -->
         <!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="service-box">
               <i><img src="icon/service6.png" /></i>
               <h3>Award winning</h3>
               <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
            </div>
         </div> -->
      </div>
   </div>
</div>
<!-- end service -->
<!-- our product -->
<div class="product">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="title">
               <h2>our <strong class="black">products</strong></h2>
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
            if ($data_product && count($data_product)) :
               foreach ($data_product as $key => $product) :
            ?>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                     <a href="product_detail.php?id=<?= $product['id'] ?? ''?>">
                     <div class="product-box">
                        <i><img src="./upload/<?php echo $product['image'] ?? '' ?>" /></i>
                        <h3><?php echo $product['description'] ?? '' ?></h3>
                        <span><?php echo $product['price'] ?? '' ?></span>
                     </div>
                     </a>
                  </div>
            <?php
               endforeach;
            endif; ?>
            <!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
               <div class="product-box">
                  <i><img src="icon/p2.png" /></i>
                  <h3>Norton Internet Security</h3>
                  <span>$25.00</span>
               </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
               <div class="product-box">
                  <i><img src="icon/p3.png" /></i>
                  <h3>Norton Internet Security</h3>
                  <span>$25.00</span>
               </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
               <div class="product-box">
                  <i><img src="icon/p4.png" /></i>
                  <h3>Norton Internet Security</h3>
                  <span>$25.00</span>
               </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
               <div class="product-box">
                  <i><img src="icon/p5.png" /></i>
                  <h3>Norton Internet Security</h3>
                  <span>$25.00</span>
               </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
               <div class="product-box">
                  <i><img src="icon/p2.png" /></i>
                  <h3>Norton Internet Security</h3>
                  <span>$25.00</span>
               </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
               <div class="product-box">
                  <i><img src="icon/p6.png" /></i>
                  <h3>Norton Internet Security</h3>
                  <span>$25.00</span>
               </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
               <div class="product-box">
                  <i><img src="icon/p7.png" /></i>
                  <h3>Norton Internet Security</h3>
                  <span>$25.00</span>
               </div>
            </div> -->
         </div>
      </div>
   </div>
   <div class="Clients_bg_white">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="title">
                  <h3>What Clients Say?</h3>
               </div>
            </div>
         </div>
         <div id="client_slider" class="carousel slide banner_Client" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#client_slider" data-slide-to="0" class="active"></li>
               <li data-target="#client_slider" data-slide-to="1"></li>
               <li data-target="#client_slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="carousel-caption text-bg">
                        <div class="img_bg">
                           <i><img src="images/lllll.png" /><span>Jone Due<br><strong class="date">12/02/2019</strong></span></i>
                        </div>
                        <p>You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am really satisfied with my first laptop service.<br>
                           You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am </p>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="carousel-caption text-bg">
                        <div class="img_bg">
                           <i><img src="images/lllll.png" /><span>Jone Due<br><strong class="date">12/02/2019</strong></span></i>

                        </div>
                        <p>You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am really satisfied with my first laptop service.<br>
                           You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am </p>

                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="carousel-caption text-bg">
                        <div class="img_bg">
                           <i><img src="images/lllll.png" /><span>Jone Due<br><strong class="date">12/02/2019</strong></span></i>

                        </div>
                        <p>You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am really satisfied with my first laptop service.<br>
                           You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am </p>

                     </div>
                  </div>
               </div>
            </div>

         </div>

      </div>
   </div>

   <div class="container">
      <div class="yellow_bg">
         <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
               <div class="yellow-box">
                  <h3>REQUEST A FREE QUOTE<i><img src="icon/calll.png" /></i></h3>

                  <p>Get answers and advice from people you want it from.</p>
               </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
               <div class="yellow-box">
                  <a href="#">Get Quote</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- end our product -->
<!-- map -->
<div class="container-fluid padi">
   <div class="map">
      <img src="images/mapimg.jpg" alt="img" />
   </div>
</div>
<!-- end map -->

<?php
include_once "./layout/front/footer.php";
?>