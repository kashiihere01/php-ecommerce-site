<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
    <meta name="description" content="Deal24 - Your one-stop shop for shoes, t-shirts, suits, perfumes, and watches. Discover the best deals on top-quality products.">
    <meta name="keywords" content="Deal24, e-commerce, online shopping, shoes, t-shirts, suits, perfumes, watches, best deals, top-quality products">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Deal24</title>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Home - Deal24">
    <meta property="og:description" content="Deal24 - Your one-stop shop for shoes, t-shirts, suits, perfumes, and watches. Discover the best deals on top-quality products.">

    <meta property="og:site_name" content="Deal24">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   
<?php require_once("includes/css-links.php"); ?>
</head>
<style>
    form a{
        color: black;
    }
    form a:hover{
        color: green;
        transition: ease-in-out;
    }
</style>
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
    <?php

if (!empty($_SESSION['success'])) {
    $msg = $_SESSION['success'];
    echo  "<div class='alert alert-success alert-dismissible fade text-white  credErr show' role='alert'>
  <strong>Congratulations!</strong> $msg
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
unset($_SESSION['success']);


if (!empty($_SESSION['error'])) {
    $msg = $_SESSION['error'];
    echo  "<div class='alert alert-danger alert-dismissible fade show credErr text-white' role='alert'>
    <strong>Warning!</strong> $msg
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
unset($_SESSION['error']);



?>

<div>
    <h2 style="font-family:monospace;" class="mb-2">Login Form</h2>

</div>

<form action="./login-qry.php" method="POST">
<div class="row ">
    <div class="col-12">
    <div class="form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
  <label for="floatingInput">Email address</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
  <label for="floatingPassword">Password</label>
</div>
    </div>
    <div class="col-12 d-flex justify-content-center mt-3">
    <button type="submit" class="btn btn-success"
        style="--bs-btn-padding-y: 7rem; --bs-btn-padding-x: 2.5rem; --bs-btn-font-size: 2.75rem;" name="login">
 Login
</button>
    </div>
    <a href="./register.php"><span class="d-flex justify-content-end">  Create an account</a></span>

</div>
</form>
   </div>
   </div>
    <?php require_once("./includes/footer.php"); ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php require_once("./includes/js-links.php");
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

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