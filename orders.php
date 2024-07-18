<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
    <meta name="description" content="Deal24 - Your one-stop shop for shoes, t-shirts, suits, perfumes, and watches. Discover the best deals on top-quality products.">
    <meta name="keywords" content="Deal24, e-commerce, online shopping, shoes, t-shirts, suits, perfumes, watches, best deals, top-quality products">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders - Deal24</title>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Home - Deal24">
    <meta property="og:description" content="Deal24 - Your one-stop shop for shoes, t-shirts, suits, perfumes, and watches. Discover the best deals on top-quality products.">

    <meta property="og:site_name" content="Deal24">

    <!-- Google Font -->
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
     <!-- Call Button -->
   
<?php require_once("includes/header.php"); ?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/bread-crumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Your Orders</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Orders</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Cancel Order</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                require_once("./includes/db-con.php");

                                $get_orders = "SELECT 
                                    orders.*,
                                    products.product_name AS product_name,
                                    products.product_price AS product_price
                                FROM 
                                    orders
                                JOIN 
                                    products ON orders.product_id = products.id
                                WHERE 
                                    orders.user_id = $_SESSION[user_id]";

                                $result = mysqli_query($con, $get_orders);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td class="shoping__cart__item text-center">
                                        <?= $row['name'] ?>
                                    </td>
                                    <td class="shoping__cart__item text-center">
                                        <?= $row['product_name'] ?>
                                    </td>
                                    <td class="shoping__cart__item text-center">
                                        <?= $row['product_price'] ?>
                                    </td>
                                    <td class="shoping__cart__item text-center">
                                        <?= $row['address'] ?>
                                    </td>
                                    <td class="shoping__cart__item text-center">
                                        <span class='badge bg-success text-white p-3' style="font-size: 15px;"><?= $row['status'] ?></span>
                                    </td>
                                    <td class="shoping__cart__item text-center">
                                    <?php if ($row['status'] !== 'cancelled') { ?>
                                            <a href="cancel_order.php?pid=<?= htmlspecialchars($row['id']) ?>"> 
                                                <button class="btn btn-sm btn-danger text-white">
                                                    <i class="fa fa-times"></i> Cancel Order
                                                </button>
                                            </a>
                                        <?php } ?></td>

                                </tr>
                            <?php
                                    }
                                } else {
                                    echo "<div class='container '>
                                    <div class=' d-flex justify-content-center'>
                                    <img src='img/no-product-found.jpg' alt='Girl in a jacket' width='400' height='300'>
                </div>
                                    <p class='text-center'>No Pending Order</p></div>";                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class='container'>
                                   
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
    <div class=' d-flex justify-content-center'>
                                    <img src='img/no-product-found.jpg' alt='Girl in a jacket' width='200' height='200'>
                </div>
    <h2 class="text-center mb-4 mt-4">No Pending Order</h2>
    <div class="row">
                <div class="col-lg-12 mb-5 ms-5">
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
