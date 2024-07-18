<?php




require_once ("db-con.php");
require_once("helpers.php");
if(isset($_SESSION["user_id"])){
$user_id = $_SESSION["user_id"];

$product_count_query = "SELECT COUNT(*) AS product FROM orders WHERE user_id= '$user_id'";
$product_count_result = mysqli_query($con, $product_count_query);
$product_count_row = mysqli_fetch_assoc($product_count_result);
$all_product = $product_count_row['product'];
    
// wishlist
$wishlist_count_query = "SELECT COUNT(*) AS product_wishlist FROM wishlist WHERE user_id= '$user_id'";
$wishlist_count_result = mysqli_query($con, $wishlist_count_query);
$wishlist_count_row = mysqli_fetch_assoc($wishlist_count_result);
$all_wishlist = $wishlist_count_row['product_wishlist'];
}
              ?>

 
 <!-- Page Preloder -->
 <!-- <div id="preloder">
     <div class="loader"></div>
 </div> -->

 <!-- Humberger Begin -->
 <div class="humberger__menu__overlay"></div>
 <div class="humberger__menu__wrapper">
     <div class="humberger__menu__logo">
         <a href="#"><img src="img/main.png" alt="" height="60px"></a>
     </div>
     <div class="humberger__menu__cart">
         <ul>
         <li><a href="wishlist.php"><i class="fa fa-heart"></i> <span><?php if(isset($_SESSION["user_id"])){
                echo("$all_wishlist");
             }else{
                echo("0");
             }?></span></a></li>

             <li><a href="orders.php"><i class="fa fa-shopping-bag"></i> <span><?php if(isset($_SESSION["user_id"])){
                echo("$all_product");
             }else{
                echo("0");
             }?></span></a></li>
         </ul>
       
     </div>
     <div class="humberger__menu__widget">
     

    <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) {

    echo " 
<div class='header__top__right__auth'>
  <a href='logout.php'><i class='fa fa-sign-out'></i>Logout</a>

</div>

";
} else {
    echo '              <div class="header__top__right__auth">
<a href="login.php"><i class="fa fa-user"></i> Login</a>

</div>';
}?>
        
     </div>
     <nav class="humberger__menu__nav mobile-menu">
         <ul>
             <li class="active"><a href="./index.php">Home</a></li>
             <li><a href="./shop-grid.php">Shop</a></li>

             <li><a href="./about.php">About Us</a></li>
             <li><a href="./contact.php">Contact</a></li>
         </ul>
     </nav>
     <div id="mobile-menu-wrap"></div>
     <div class="header__top__right__social">
         <a href="#"><i class="fa fa-facebook"></i></a>
         <a href="https://wa.me/03103431884"><i class="fa fa-whatsapp"></i></a>
                             <a href="https://www.instagram.com/dbalouch50?igsh=MWZ6bmV1cmZvYnYzZQ=="><i class="fa fa-instagram"></i></a>
     </div>
     <div class="humberger__menu__contact">
         <ul>
             <li><i class="fa fa-envelope"></i> Dbalouch50@gmail.com</li>
             <li>Cash will received on delivery & 7 days return policy</li>
         </ul>
     </div>
 </div>
 <!-- Humberger End -->

 <!-- Header Section Begin -->
 <header class="header">
     <div class="header__top">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6 col-md-6">
                     <div class="header__top__left">
                         <ul>
                             <li><i class="fa fa-envelope"></i> Dbalouch50@gmail.com</li>
                             <li>Cash will received on delivery & 7 days return policy</li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-6 col-md-6">
                     <div class="header__top__right">
                         <div class="header__top__right__social">
                             <a href="#"><i class="fa fa-facebook"></i></a>
                             <a href="https://wa.me/03103431884"><i class="fa fa-whatsapp"></i></a>
                             <a href="https://www.instagram.com/dbalouch50?igsh=MWZ6bmV1cmZvYnYzZQ=="><i class="fa fa-instagram"></i></a>
                         
                         </div>
          
                         <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    echo " 
<div class='header__top__right__auth'>
  <a href='logout.php'><i class='fa fa-sign-out'></i>Logout</a>

</div>
";
} else {
    echo '              <div class="header__top__right__auth">
<a href="login.php"><i class="fa fa-user"></i> Login</a>

</div>';
}?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <div class="header__logo">
                     <a href="./index.php"><img src="img/main.png" alt="" height="80px"></a>
                 </div>
             </div>
             <div class="col-lg-6">
                 <nav class="header__menu">
                     <ul>
                         <li class="active"><a href="./index.php">Home</a></li>
                         <li><a href="./shop-grid.php">Shop</a></li>
                       
                         <li><a href="./about.php">About Us</a></li>
                         <li><a href="./contact.php">Contact</a></li>
                     </ul>
                 </nav>
             </div>
             <div class="col-lg-3">
                 <div class="header__cart">
                     <ul>
                     <li><a href="wishlist.php"><i class="fa fa-heart"></i> <span><?php if(isset($_SESSION["user_id"])){
                echo("$all_wishlist");
             }else{
                echo("0");
             }?></span></a></li>
                         <li><a href="orders.php"><i class="fa fa-shopping-cart"></i> <span><?php if(isset($_SESSION["user_id"])){
                echo("$all_product");
             }else{
                echo("0");
             }?></span></a></li>
                     </ul>                 </div>
             </div>
         </div>
         <div class="humberger__open">
             <i class="fa fa-bars"></i>
         </div>
     </div>
 </header>
 <!-- Header Section End -->
    <!-- Hero Section Begin -->
    
      

