
<?php
require_once("./auth.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deals24</title>
    <?php require_once("./includes/css-links.php"); ?>
    <!-- Header Section Begin -->

</head>

<body>
<?php require_once("./includes/header.php"); ?>
<?php
                            // Retrieving product ID from URL parameter
                            $productid = isset($_GET['pid']) ? $_GET['pid'] : '';
                            ?>
<!-- Header Section End -->
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="./order-qry.php" method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input type="text" placeholder="Enter Here............" name="name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>City<span>*</span></p>
                                        <input type="text" placeholder="Enter Here............" name="city" required>
                                    </div>
                                </div>
                            </div>
                         
                            <input type="hidden" name="pid" value="<?= htmlspecialchars($productid) ?>" >

                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="address" required>
                            </div>

                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="number" placeholder="Enter Here............" name="zip" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="number" placeholder="Enter Here............" name="mobile" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" placeholder="Enter Here............" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="site-btn" name="order">PLACE ORDER</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <?php require_once("./includes/footer.php"); ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php require_once("./includes/js-links.php"); ?>

</body>

</html>
