<?php require_once("./auth.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Profile - Mk Fashion</title>

    <!-- css-links include -->
    <?php require_once("./includes/css-links.php") ?>

</head>

<body>

    <!-- navbar include -->
    <?php require_once("./includes/navbar.php") ?>

    <!-- sidebar include -->
    <?php require_once("./includes/sidebar.php") ?>

    <div class="content-body">

        <!-- Add and View Users -->
       


        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column  mb-4">
                                <img class="mx-auto rounded-circle" src="./images/admin-users/<?= $row['image'] ?>" width="80" height="80" alt="">
                                <div class="media-body text-center">
                                    <h3 class="mb-0"><?= $_SESSION['user_name'] ?></h3>
                                </div>
                            </div>


                            <ul class="card-profile__info">
                                <li class="mb-2"><strong class="text-dark mr-4">Mobile</strong> <span><?= $_SESSION['user_mobile'] ?></span></li>
                                <li class="mb-2"><strong class="text-dark mr-4">Email</strong> <span><?= $_SESSION['user_email'] ?></span></li>
                                

                            </ul>

                            
                            <div class="row my-2">
                                <div class="col-12 text-center">
                                    <a href="profile-edit.php?id=<?= $row['id'] ?>"><button class="btn btn-danger px-5">Edit Profile <i class="fa fa-edit"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                        <form action="./change-password-qry.php" class="form-profile" method="POST">
                            <div class="row">
                                <div class="col-md-6">
<h2 class="mt-3 mb-3">Change Password</h2>
                                </div>
                                <div class="col-md-6">
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
           
            <hr>
                            </div>
                <div class="form-group">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
                        </div>
                        <div class="col-md-4">
                            <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
                        </div>
                        <div class="col-md-4">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-success" type="submit" name="change_password">Change Password</button>
                        </div>
                    </div>
                </div>
            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div> <!--*** Main wrapper end *****-->

    <!-- footer include -->
    <?php require_once("./includes/footer.php")  ?>

    <!-- javascript links include -->
    <?php require_once("./includes/javascript-links.php")  ?>
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