<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>M.K Fashion | Search Results</title>
    <!-- css links include -->
    <?php require_once("./includes/css-links.php") ?>
</head>
<body>
    <!-- header-section include -->
    <?php require_once("./includes/header.php") ?>

    <div class="container">
        <div class="row m-0">
            <?php
            require_once("./includes/db-con.php");
            require_once("./includes/helpers.php");

            // Check if the form was submitted and search term is set
            if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['search'])) {
                // Sanitize search term
                $search_word = mysqli_real_escape_string($con, $_POST['search']);

                // Construct the query
                $search_qry = "SELECT * FROM products 
                               LEFT JOIN categories 
                               ON products.category_id = categories.id 
                               WHERE products.product_name LIKE '%$search_word%'";

                // Execute the search query
                $result = mysqli_query($con, $search_qry);

                // Check for errors
                if (!$result) {
                    die("Query failed: " . mysqli_error($con));
                }

                // Check if any results were found
                if (mysqli_num_rows($result) > 0) {
                    // Process the result and display products
                    while ($prt = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6" data-category-id="<?php echo $prt['category_id']; ?>">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="<?php echo getImageUrl("product", $prt['product_image']) ?>">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="product-details.php?pid=<?= $prt['id'] ?>"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="checkout.php?pid=<?= $prt['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li>
    <a href="add_to_wishlist.php?pid=<?= $prt['id'] ?>">
        <i class="fa fa-heart"></i>                                     </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="product-details.php?pid=<?= $prt['id'] ?>"><?= $prt['product_name'] ?></a></h6>
                                    <h5>Rs: <?= $prt['product_price'] ?></h5>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<div class='container '>
                    <div class=' d-flex justify-content-center'>
                    <img src='img/no-product-found.jpg' alt='Girl in a jacket' width='400' height='300'>
</div>
                    <p class='text-center'>No products found matching your search term.</p></div>";
                }

                // Free result set
                mysqli_free_result($result);
            } else {
                echo "<div class='container '>
                    <div class=' d-flex justify-content-center'>
                    <img src='img/no-product-found.jpg' alt='Girl in a jacket' width='400' height='300'>
</div>
                    <p class='text-center'>Please Enter Corect Key Words</p></div>";
            }
            ?>
        </div>
    </div>

    <!-- footer includes -->
    <?php require_once("./includes/footer.php")  ?>

    <?php require_once("./includes/js-links.php") ?>
</body>
</html>
