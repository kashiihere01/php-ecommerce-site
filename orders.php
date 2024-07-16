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

    <!-- Google Font -->
  
<?php require_once("includes/css-links.php"); ?>
</head>

<body>
   
<?php require_once("includes/header.php"); ?>



    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
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

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th >Name</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
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
                                    <?php
                              }
                            }
                              ?> 
                                   
                                </tr>
                           
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="./shop-grid.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php require_once("./includes/footer.php"); ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php require_once("./includes/js-links.php"); ?>


</body>

</html>