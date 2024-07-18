<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
    <meta name="description" content="Deal24 - Your one-stop shop for shoes, t-shirts, suits, perfumes, and watches. Discover the best deals on top-quality products.">
    <meta name="keywords" content="Deal24, e-commerce, online shopping, shoes, t-shirts, suits, perfumes, watches, best deals, top-quality products">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up - Deal24</title>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Home - Deal24">
    <meta property="og:description" content="Deal24 - Your one-stop shop for shoes, t-shirts, suits, perfumes, and watches. Discover the best deals on top-quality products.">

    <meta property="og:site_name" content="Deal24">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


   <?php require_once("includes/css-links.php"); ?>
   <style>
    form a{
        color: black;
    }
    form a:hover{
        color: green;
        transition: ease-in-out;
    }
</style>
</head>

<body>

   <?php require_once("includes/header.php"); ?>

   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-section set-bg" data-setbg="img/bread-crumb.jpg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 text-center">
               <div class="breadcrumb__text">
                  <h2>Login</h2>
                  <div class="breadcrumb__option">
                     <a href="./index.html">Home</a>
                     <span>Login</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Breadcrumb Section End -->

   <div class="container d-flex justify-content-center">
      <div class="card align-items-center p-5 shadow-lg mb-4 mt-4" style="border: none;">
         <div>
            <h2 style="font-family:monospace;" class="mb-2">Registration Form</h2>
         </div>
         <form action="./sign-up-qry.php" method="POST">
            <div class="row ">
               <div class="col-md-4 col-lg-6">
                  <div class="form-floating mb-3">
                     <input type="text" class="form-control" id="floatingInput" placeholder="Enter Here................." name="name" required>
                     <label for="floatingInput">Full Name</label>

                  </div>
               </div>
               <div class="col-md-4 col-lg-6">
                  <div class="form-floating mb-3">
                     <input type="number" class="form-control" id="floatingInput" placeholder="Enter Here................." name="mobile" required>
                     <label for="floatingInput">Enter Phone no</label>

                  </div>
               </div>
               <div class="col-md-6 col-lg-12">
                  <div class="form-floating mb-3">
                     <input type="email" class="form-control" id="floatingInput" placeholder="Enter Here................." name="email" required>
                     <label for="floatingInput">Enter Email</label>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 col-lg-6">
                  <div class="form-floating mb-3">
                     <input type="password" class="form-control" id="floatingInput" placeholder="Enter Here................." name="password" required>
                     <label for="floatingInput">Password</label>
                  </div>
               </div>
               <div class="col-md-4 col-lg-6">
                  <div class="form-floating mb-3">
                     <input type="text" class="form-control" id="floatingInput" placeholder="Enter Here................." required name="city">
                     <label for="floatingInput">city</label>
                  </div>
               </div>
            </div>

            <div class="col-12 d-flex justify-content-center mt-3">
               <button type="submit" class="btn btn-success" name="signup" value="signup"
                  style="--bs-btn-padding-y: 7rem; --bs-btn-padding-x: 2.5rem; --bs-btn-font-size: 2.75rem;" name="">
                  Sign up
               </button>

              
            </div>
            <p class="d-flex justify-content-end">
                  <a href="./login.php"><span class="d-flex justify-content-end"> Have an account? Login Now</a></span>
               </p>
         </form>
      </div>
   </div>
   <?php require_once("./includes/footer.php"); ?>
   <!-- Footer Section End -->

   <!-- Js Plugins -->
   <?php require_once("./includes/js-links.php"); ?>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</body>

</html>