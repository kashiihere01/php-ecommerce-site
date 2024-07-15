<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("./includes/db-con.php");
require_once("./includes/helpers.php"); // Include your file with all helper functions
require_once("./includes/css-links.php");

$limit = 12; // Number of products per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;

if ($category_id) {
    $query = "SELECT * FROM products WHERE category_id = $category_id LIMIT $limit OFFSET $offset";
} else {
    $query = "SELECT * FROM products LIMIT $limit OFFSET $offset";
}

$result = mysqli_query($con, $query);

while ($prt = mysqli_fetch_assoc($result)) {
    $prd = getCategroyById($con, $prt['category_id']);
    ?>
    <div class="col-lg-4 col-md-6 col-sm-6 product-item" data-category-id="<?php echo $prt['category_id']; ?>">
        <div class="product__item">
<div class="product__item__pic set-bg" data-setbg="<?php echo imageUrl("products", $prt['product_image']); ?>" style="background-image: url('<?php echo imageUrl("products", $prt['product_image']); ?>');">
                <ul class="product__hover">
                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Details</span></a></li>
                    <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                </ul>
            </div>
            <div class="product__item__text">
                <h6> <?= $prt['product_name'] ?></h6>
                <a href="#" class="add-cart">+ Add To Cart</a>
                <div class="rating">
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <h5>RS : <?= $prt['unit_price'] ?></h5>
                <div class="product__color__select">
                    <label for="pc-4">
                        <input type="radio" id="pc-4">
                    </label>
                    <label class="active black" for="pc-5">
                        <input type="radio" id="pc-5">
                    </label>
                    <label class="grey" for="pc-6">
                        <input type="radio" id="pc-6">
                    </label>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
