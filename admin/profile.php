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
        <?php if ($_SESSION['user_role'] === "admin") {
            echo '
            <div class="d-flex justify-content-end mt-4">
            <div class="me-2">
                <a href="./add-user.php" class="btn btn-success text-white"><i class="fa fa-plus"></i> Add Users</a>
            </div>
                  
            <div class="ms-3">
                <a href="./add-user.php" class="btn btn-success text-white"><i class="fa fa-plus"></i> Add Users</a>
            </div>
</div>
        
            ';
        } ?>



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
                            <form action="#" class="form-profile">
                                <div class="form-group">
                                    <textarea class="form-control" name="textarea" id="textarea" cols="30" rows="2" placeholder="Post a new message"></textarea>
                                </div>
                                <div class="d-flex align-items-center">
                                    <ul class="mb-0 form-profile__icons">
                                        <li class="d-inline-block">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-user"></i></button>
                                        </li>
                                        <li class="d-inline-block">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-paper-plane"></i></button>
                                        </li>
                                        <li class="d-inline-block">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-camera"></i></button>
                                        </li>
                                        <li class="d-inline-block">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-smile"></i></button>
                                        </li>
                                    </ul>
                                    <button class="btn btn-success text-white px-3 ml-4">Send</button>
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
</body>

</html>