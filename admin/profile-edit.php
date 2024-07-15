<?php

require_once("./auth.php");
require_once("./db-con.php");

$get_user_id = $_GET['id'];

$select = "SELECT * FROM users WHERE id='$get_user_id'";
$result = mysqli_query($con, $select);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edit Profile</title>

    <!-- css-links include -->
    <?php require_once("./includes/css-links.php") ?>
    
</head>

<body>

   <!-- navbar include -->
   <?php require_once("./includes/navbar.php") ?>

<!-- sidebar include -->
<?php require_once("./includes/sidebar.php") ?>

<div class="content-body p-3">




    <!-- view categories container -->
    <div class="container mt-3 bg-white p-4">

        <div class="row">
         
                <div class="col-md-6">
                    <h3> <i class="fa fa-edit text-success"></i> Edit Profile</h3>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <img src="./images/admin-users/<?= $row['image'] ?>" class="" height="50px">
                </div>
            </div>
            <hr>
            <div class="col-md-8">
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
            </div>
        </div>
        <hr>

        <div class="form-container">
            <form action="./profile-update-qry.php" method="POST" enctype="multipart/form-data" class="row">
            <input type="hidden" name="id" value="<?= $get_user_id ?>">
                <div class="col-lg-6 mb-2">
                    <label class="form-label" for="username">User Name <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="username" value="<?= $row['username'] ?>" name="username" placeholder="Enter here..." required>
                </div>


                <div class="col-lg-6 mb-2">
                    <label class="form-label" for="email">Email <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?>" placeholder="Enter here..." required>
                </div>

                <div class="col-lg-4 mb-2">
                    <label class="form-label" for="mobile">Mobile <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control" id="mobile" value="<?= $row['mobile'] ?>" name="mobile" value="<?= $row['image'] ?>" data-inputmask="'mask':'9999-99999999'" placeholder="XXXX-XXXXXXX" required>
                </div>

                <div class="col-lg-4">
                    <label class="form-label" for="password">Password <span class="text-danger">*</span>
                    </label>
                    <input type="password" class="form-control" value="<?= $row['password'] ?>" id="password" name="password" placeholder="Enter here..." required>
                </div>



                <div class="col-lg-4 mb-2">
                        <label class="form-label" for="image">Image <span class="text-danger">*</span>
                        </label>
                        <input type="file" class="form-control" id="userimage" name="new_image" accept="image/*">
                    <input type="hidden" class="form-control" value="<?= $row['image'] ?>" name="old_image" accept="image/*" required>                    </div>


             

                <div class="offset-8 col-lg-4 mb-2">
                    <label for=""></label>

                    <button class="btn btn-success text-white btn-lg mt-2 w-100" name='add-user'> <i class="fa fa-plus"></i> Edit Profile</button>
                </div>

            </form>
        </div>

    </div>

</div> <!--*** Main wrapper end *****-->

<!-- footer include -->
<?php require_once("./includes/footer.php")  ?>

<!-- javascript links include -->
<?php require_once("./includes/javascript-links.php")  ?>

<!-- masking files and function start -->

<script src="./js/jquery.min.js"></script>
<script src="./js/jquery.inputmask.bundle.js"></script>

<script>
    $(":input").inputmask();
</script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".uploadingErr").remove();
        }, 3000);


        setTimeout(function() {
            $(".credErr").remove();
        }, 3000);

    })
</script>



</body>

</html>