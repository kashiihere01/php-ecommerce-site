<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
    <meta name="description" content="Deal24 - Your one-stop shop for shoes, t-shirts, suits, perfumes, and watches. Discover the best deals on top-quality products.">
    <meta name="keywords" content="Deal24, e-commerce, online shopping, shoes, t-shirts, suits, perfumes, watches, best deals, top-quality products">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Detail - Deal24</title>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Home - Deal24">
    <meta property="og:description" content="Deal24 - Your one-stop shop for shoes, t-shirts, suits, perfumes, and watches. Discover the best deals on top-quality products.">

    <meta property="og:site_name" content="Deal24">
    <?php require_once("includes/css-links.php"); ?>
</head>

<body>
    
    <!-- header-section include -->
    <?php require_once("./includes/header.php") ?>
 <!-- Call Button --><?php 
        $pid = null;
        $product = null;
      
        if(isset($_GET['pid'])){
            $pid = $_GET['pid'];
            $ret = getProducts($con, null, $pid);
            $product = mysqli_fetch_assoc($ret);
            $cat_id= getCategroyByID($con, $product['category_id']);
        }

        $nextProducts = getnextProducts($con);

    ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/bread-crumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php echo $product['product_name']?></h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <a href="./products.php"><?php echo $cat_id['category']?></a>
                            <span><?php echo $product['product_name']?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="./admin/images/product/<?php echo $product['product_image']?>" alt="" height="700px">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $product['product_name']?></h3>
                 
                        <div class="product__details__price"><?php echo $product['product_price']?></div>
                        <p><?php echo $product['product_description']?></p>
                     <button class="btn btn-sm btn-success text-white p-2">
                     <a href="checkout.php?pid=<?= $product['id'] ?>"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                     </button>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
                    
                           
                          
                           
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
   
    <section class="categories mb-5">
                    <div class="container">
                    <div class="section-title product__discount__title">
                    <h2>Related Product</h2>
                </div>
                        <div class="row">
                            <div class="categories__slider owl-carousel">
                                <?php while ($row = mysqli_fetch_assoc($nextProducts)) { ?>
                                    <div class="col-lg-3">
                                        <div class="categories__item set-bg" data-setbg="<?php echo getImageUrl("product", $row['product_image']) ?>">
                                            <h5><a href="./shop-grid.php"><?= $row['product_name'] ?></a></h5>
                                        </div>
                                    </div>
                                <?php }
                                mysqli_data_seek($nextProducts, 0);
                                ?>

                            </div>
                        </div>
                    </div>
                </section>
   
    <!-- footer include -->
    <?php require_once("./includes/footer.php") ?>

    <!-- javascript links include -->
    <?php require_once("./includes/js-links.php") ?>
    <script>
    // Function to open call dialer
function openCallDial() {
  // Replace '123456789' with the actual phone number you want to call
  window.location.href = 'tel:++92310 3431884 ';
}

// Function to open WhatsApp chat
function openWhatsAppChat() {
  // Replace '123456789' with the actual phone number you want to chat with
  window.location.href = 'https://wa.me/0310 3431884 ';
}
   </script>

</body>

</html>