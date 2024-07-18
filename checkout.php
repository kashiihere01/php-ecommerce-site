<?php require_once("./auth.php")?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="description" content="Deal24 - Your one-stop shop for shoes, t-shirts, suits, perfumes, and watches. Discover the best deals on top-quality products.">
    <meta name="keywords" content="Deal24, e-commerce, online shopping, shoes, t-shirts, suits, perfumes, watches, best deals, top-quality products">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check Out - Deal24</title>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Home - Deal24">
    <meta property="og:description" content="Deal24 - Your one-stop shop for shoes, t-shirts, suits, perfumes, and watches. Discover the best deals on top-quality products.">

    <meta property="og:site_name" content="Deal24">
    <?php require_once("includes/css-links.php"); ?>
</head>

<body>

<?php require_once("./includes/header.php"); ?>
<?php
                            // Retrieving product ID from URL parameter
                            $productid = isset($_GET['pid']) ? $_GET['pid'] : '';
                            ?>
<!-- Header Section End -->
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/bread-crumb.jpg">
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
                <?php

if (!empty($_SESSION['success'])) {
    $msg = $_SESSION['success'];
    echo " <div class='alert alert-success alert-dismissible fade show credErr'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
        </button> <strong>Congratulation! </strong> $msg</div>";
}
unset($_SESSION['success']);


if (!empty($_SESSION['error'])) {
    $msg = $_SESSION['error'];
    echo " <div class='alert alert-danger alert-dismissible fade show credErr'>
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
