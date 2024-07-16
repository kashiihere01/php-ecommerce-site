<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deals24</title>

    <!-- Google Font -->

    <?php require_once("includes/css-links.php"); ?>
</head>

<body>

    <?php require_once("includes/header.php"); ?>
    <?php
    // select categories
    $cats = getCategories($con);

    // get products
    $products = getProducts($con);

    $bestseller = getBestProducts($con);

    $latestProducts = getLatestProducts($con);




    ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                <?php while ($ct = mysqli_fetch_assoc($cats)) { ?>
                                    <li><a href="#" data-category-id="<?= $ct['id'] ?>" class="category-filter"><?php echo $ct['category'] ?></a></li>
                                <?php }
                                mysqli_data_seek($cats, 0);
                                ?>
                            </ul>
                        </div>

                    </div>



                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Best Beller</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <?php while ($bs = mysqli_fetch_assoc($bestseller)) { ?>
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">

                                            <div class="product__discount__item__pic set-bg" data-setbg="<?php echo getImageUrl("product", $bs['product_image']) ?>">
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="product-details.php?pid=<?= $bs['id'] ?>"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="checkout.php?pid=<?= $bs['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">

                                                <h5><a href="product-details.php?pid=<?= $bs['id'] ?>"><?= $bs['product_name'] ?></a></h5>
                                                <div class="product__item__price">RS : <?= $bs['product_price'] ?> </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php }
                                mysqli_data_seek($bestseller, 0);
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
                        <h2>All Product</h2>
                    </div>

                </div>
            </div>
            <div class="row featured__filter" id="product-container">
                <?php while ($prt = mysqli_fetch_assoc($products)) { ?>
                    <?php $prd = getCategroyById($con, $prt['category_id']); ?>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-category-id="<?php echo $prt['category_id']; ?>">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="<?php echo getImageUrl("product", $prt['product_image']) ?>">
                                <ul class="featured__item__pic__hover">

                                    <li><a href="product-details.php?pid=<?= $prt['id'] ?>"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="checkout.php?pid=<?= $prt['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
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







    <!-- Product Section End -->

    <?php require_once("./includes/footer.php"); ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php require_once("./includes/js-links.php"); ?>


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