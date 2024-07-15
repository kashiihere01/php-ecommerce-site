<!DOCTYPE html>
<html lang="zxx">

<head>

    <title>M.K Fashion | Contact us</title>

    <!-- css links include -->
    <?php require_once("./includes/css-links.php") ?>

</head>

<body>
     <!-- header-section include -->
     <?php require_once("./includes/header.php") ?>

<div class="row m-0">


<?php

require_once("./includes/helpers.php");
require_once("./includes/css-links.php");

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
    // get products
    $products = getProducts($con);
// Process the result, for example, fetch the rows
while ($row = mysqli_fetch_assoc($result)) {


?>
    <div class="col-lg-3 col-md-4 col-sm-6 mix ;
                                                echo $ptc['category'] ?>">
        <div class="featured__item">
            <div class="featured__item__pic set-bg" data-setbg="<?php echo getImageUrl("product", $row['product_image']) ?>">
                <ul class="featured__item__pic__hover">

                    <li><a href="product-details.php?pid="><i class="fa fa-retweet"></i></a></li>

                </ul>
            </div>
            <div class="featured__item__text">
                <h6><a href="product-details.php?pid=<?= $pt['id'] ?>"><?= $row['product_name'] ?></a></h6>
                <h5>RS :<?= $row['product_price'] ?></h5>
            </div>
        </div>
    </div>
<?php }
mysqli_data_seek($products, 0);
?>
</div>
    <!-- footer includes -->
    <?php require_once("./includes/footer.php")  ?>

<?php require_once("./includes/js-links.php") ?>
</body>