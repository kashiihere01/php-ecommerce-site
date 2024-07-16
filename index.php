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
</head>

<body>
   
<?php require_once("includes/header.php"); ?>
<?php
    // select categories
    $cats = getCategories($con);

    // get products
    $products = getProducts($con);

    $featureProducts = getFeatureProducts($con);

    $latestProducts = getLatestProducts($con);




    ?>



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
                                            <h5><a href="./shop.php"><?= $row['category'] ?></a></h5>
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
                                            <h5><a href="./shop.php"><?= $row['product_name'] ?></a></h5>
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
    <!-- Featured Section End -->

   

    
                 
    <!-- Blog Section End -->
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