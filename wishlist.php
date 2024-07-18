<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
    <meta name="description" content="Deal24 - Your one-stop shop for shoes, t-shirts, suits, perfumes, and watches. Discover the best deals on top-quality products.">
    <meta name="keywords" content="Deal24, e-commerce, online shopping, shoes, t-shirts, suits, perfumes, watches, best deals, top-quality products">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wishlist - Deal24</title>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Home - Deal24">
    <meta property="og:description" content="Deal24 - Your one-stop shop for shoes, t-shirts, suits, perfumes, and watches. Discover the best deals on top-quality products.">

    <meta property="og:site_name" content="Deal24">

    <!-- Google Font -->
    <?php require_once("includes/css-links.php"); ?>
    <style>
      td a{
        color: black;
      }
      td a:hover{
        color: black;
      }
    </style>
</head>

<body>

<?php require_once("includes/header.php"); ?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/bread-crumb.jpg">
    <div class="container">
        <div class="wishlist">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Your Wishlist</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.php">Home</a>
                        <span>wishlist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<?php

if (!empty($_SESSION['success'])) {
    $msg = $_SESSION['success'];
    echo " <div class='alert alert-success alert-dismissible fade show credErr  w-50 mt-5 justify-content-center'>
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
<?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="wishlist">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Product Image</th>
                                    <th class="shoping__product">Product Name</th>
                                    <th class="shoping__product">Price</th>
                                    <th class="shoping__product"></th>
                                    <th class="shoping__product"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                require_once("./includes/db-con.php");

                                $get_orders = "SELECT 
                                    wishlist.*,
                                    products.product_name AS product_name,
                                    products.product_price AS product_price,
                                    products.product_image AS product_image
                                FROM 
                                    wishlist
                                JOIN 
                                    products ON wishlist.product_id = products.id
                                WHERE 
                                    wishlist.user_id = '$_SESSION[user_id]'";

                                $result = mysqli_query($con, $get_orders);

                                if (!$result) {
                                    echo "Error: " . mysqli_error($con);
                                    exit();
                                }

                                if (mysqli_num_rows($result) > 0) {
                                    while ($wishlist = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td class="shoping__cart__item ">
                                        <img src="admin/images/product/<?= htmlspecialchars($wishlist['product_image']) ?>" alt="" height="60px">
                                    </td>
                                    <td class="shoping__cart__item ">
                                        <?= htmlspecialchars($wishlist['product_name']) ?>
                                    </td>
                                    <td class="shoping__cart__item text-center">
                                        <?= htmlspecialchars($wishlist['product_price']) ?>
                                    </td>
                                    <td class="shoping__cart__item ">
                                        <a href="checkout.php?pid=<?= htmlspecialchars($wishlist['id']) ?>"> <button class="btn btn-sm btn-success text-white"><i class="fa fa-shopping-cart"></i> Buy Now</button></a>
                                    </td>
                                    <td class="shoping__cart__item ">
                                        <a href="./delete-wishlist.php?id=<?= htmlspecialchars($wishlist['id']) ?>"><i class="icon_close" style="font-size: 2rem;"></i></a>
                                    </td>
                                </tr>
                            <?php
                                    }
                                } else {
                                    echo "<div class='container'>
                                    <div class=' d-flex justify-content-center'>
                                    <img src='img/no-product-found.jpg' alt='No product found' width='400' height='300'>
                                    </div>
                                    <p class='text-center'>No products added to Wishlist</p></div>";                                
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="wishlist">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="./shop-grid.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
<?php } else { ?>
    <div class='container'>
        <div class='d-flex justify-content-center'>
            <img src='img/no-product-found.jpg' alt='No product found' width='400' height='300'>
        </div>
        <p class='text-center'>No products added to Wishlist</p>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-5 ">
            <div class="shoping__cart__btns">
                <a href="./shop-grid.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Footer Section Begin -->
<?php require_once("./includes/footer.php"); ?>
<!-- Footer Section End -->

<!-- Js Plugins -->
<?php require_once("./includes/js-links.php"); ?>
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
</body>
</html>
