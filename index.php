<?php session_start();?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deals24</title>

<?php require_once("includes/css-links.php"); ?>
<style>
      .call-icons{
        position: fixed;
        bottom: 25px;
        right: 25px;
      }

      .wa-icons{
        position: fixed;
        bottom: 25px;
        left: 25px;
      }
    </style>
</head>

<body>

<?php require_once("includes/header.php"); ?>


<?php

if (!empty($_SESSION['success'])) {
    $msg = $_SESSION['success'];
    echo " <div class='alert alert-success alert-dismissible fade show credErr  w-50 justify-content-center'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
        </button> <strong>Congratulation! </strong> $msg</div>";
}
unset($_SESSION['success']);


if (!empty($_SESSION['error'])) {
    $msg = $_SESSION['error'];
    echo " <div class='alert alert-danger alert-dismissible fade show credErr w-50'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
        </button> <strong>Warning! </strong> $msg</div>";
}
unset($_SESSION['error']);

if (!empty($_SESSION['imgErr'])) {
    $msg = $_SESSION['imgErr'];
    echo " <div class='alert alert-danger alert-dismissible fade show credErr'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
        </button> <strong>Warning! </strong> $msg</div>";
}
unset($_SESSION['imgErr']);

?>
<?php
    // select categories
    $cats = getCategories($con);

    // get products
    $products = getProducts($con);

    $featureProducts = getFeatureProducts($con);

    $latestProducts = getLatestProducts($con);




    ?>
  <!-- hero begin  -->
 <!-- Hero Section Begin -->
 <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                        <?php while ($ct = mysqli_fetch_assoc($cats)) { ?>
                                                    <li><a href="#" data-category-id="<?= $ct['id'] ?>" class="category-filter"><?php echo $ct['category'] ?></a></li>
                                                <?php }
                                                mysqli_data_seek($cats, 0);
                                                ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                        <form action="search-qry.php" method="POST">
        <input type="text" placeholder="What do you need?" name="search" required>
        <button type="submit" class="site-btn">SEARCH</button>
    </form>

                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+92 310 3431884</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/hero.jpg">
                        <div class="hero__text">
                            <span></span>
                            <h2>Shop Your <br />Favourite thing</h2>
                            <p>Free Delivery and 7 Days retun Policy</p>
                            <a href="shop-grid.php" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

 


    <!-- Categories Section Begin -->
    <section class="categories mb-4">
        <div class="container">
        <div class="section-title">

                        <h2> Product Categories</h2>
                    </div>
            <div class="row">
                <div class="categories__slider owl-carousel">
                <?php while ($row = mysqli_fetch_assoc($cats)) { ?>
                                    <div class="col-lg-3">
                                        <div class="categories__item set-bg" data-setbg="admin/images/categories/<?php echo $row['category_image'] ?>">
                                            <h5><a href="./shop-grid.php"><?= $row['category'] ?></a></h5>
                                        </div>
                                    </div>
                                <?php }
                                mysqli_data_seek($cats, 0);
                                ?>

                    
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
    <hr class="mt-5 mb-4 w-75">
    <!-- latest products -->
    <section class="categories">
        <div class="container">
        <div class="section-title">
                        <h2>Latest Product</h2>
                    </div>
            <div class="row">
                <div class="categories__slider owl-carousel">
                <?php while ($row = mysqli_fetch_assoc($latestProducts)) { ?>
                                    <div class="col-lg-3">
                                        <div class="categories__item set-bg" data-setbg="admin/images/product/<?php echo $row['product_image']?>">
                                            <h5><a href="./shop-grid.php"><?= $row['product_name'] ?></a></h5>
                                        </div>
                                    </div>
                                <?php }
                                mysqli_data_seek($latestProducts, 0);
                                ?>

                    
                   
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                   
                </div>
            </div>
            <div class="row featured__filter" id="product-container">
            <?php while($prt= mysqli_fetch_assoc($products) ) { ?>
                <?php $prd= getCategroyById($con, $prt['category_id']); ?>
                <div class="col-lg-3 col-md-4 col-sm-6 product-item" data-category-id="<?php echo $prt['category_id']; ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo getImageUrl("product", $prt['product_image']) ?>">
                            <ul class="featured__item__pic__hover">
                            
                                <li><a href="product-details.php?pid=<?= $prt['id'] ?>"><i class="fa fa-eye"></i></a></li>
                                <li><a href="checkout.php?pid=<?= $prt['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>


                                <li>
    <a href="add_to_wishlist.php?pid=<?= $prt['id'] ?>">
        <i class="fa fa-heart"></i> 
    </a>
</li>

    </a>
</li>


                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="product-details.php?pid=<?= $prt['id'] ?>"><?= $prt['product_name'] ?></a></h6>
                            <h5>Rs : <?= $prt['product_price'] ?></h5>
                        </div>
                    </div>
                </div>
                <?php } 
                    mysqli_data_seek($products, 0);
                    ?>              
            </div>
        </div>
    </section>
    <!-- Featured Section End -->


    
                 
    <!-- Blog Section End -->
<?php require_once("./includes/footer.php"); ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php require_once("./includes/js-links.php"); ?>

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
     <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".uploadingErr").remove();
            }, 5000);


            setTimeout(function() {
                $(".credErr").remove();
            }, 3000);

        })
    </script>
       <script>
        $(document).ready(function() {
            $('.category-filter').on('click', function(e) {
                e.preventDefault();
                var categoryId = $(this).data('category-id');
                filterProductsByCategory(categoryId);
            });

            function filterProductsByCategory(categoryId) {
                $('.product-item').hide();
                $('.product-item').each(function() {
                    if ($(this).data('category-id') == categoryId) {
                        $(this).show();
                    }
                });
            }
        });
    </script>
</body>
</html>