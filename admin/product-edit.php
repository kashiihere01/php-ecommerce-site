<?php

require_once("./auth.php");
require_once("./db-con.php");

$get_product_id = $_GET['id'];

$select = "SELECT * FROM products WHERE id='$get_product_id'";
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
    <title>Edit Products</title>

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
        <div class="row">
                <div class="col-md-6">
                    <h3> <i class="fa fa-edit text-success"></i> Edit Product</h3>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <img src="./images/product/<?= $row['product_image'] ?>" class="" height="50px">
                </div>
            </div>
            <hr>

         

            <div class="form-container">
                <form action="./product-update-qry.php" method="POST" enctype="multipart/form-data" class="row">
<input type="hidden" name="id" value="<?= $get_product_id ?>">
                    <div class="col-lg-6 mb-2">
                        <label class="form-label" for="name">Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" value="<?= $row['product_name'] ?>" id="name" name="name" placeholder="Enter here..." required>
                    </div>


                    <div class="col-lg-6 mb-2">
                        <label class="form-label" for="unit_price">Unit Price <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control" id="unit_price" value="<?= $row['product_price'] ?>" name="unit_price" placeholder="Enter here..." required>
                    </div>



                    <div class="col-lg-6 mb-2">
                        <label class="form-label" for="category">Category <span class="text-danger">*</span>
                        </label>
                        <select class="form-control" name="category" id="category" value="<?= $row['category'] ?>">
                            <option value="-1">Choose here</option>
                            <!-- fetch category from category table -->
                            <?php
                            require_once "./db-con.php";

                            $select = "SELECT * FROM categories";
                            $result = mysqli_query($con, $select);

                            if (mysqli_num_rows($result) > 0) {

                                while ($row2 = mysqli_fetch_assoc($result)) {
                                    if($row2['id'] == $row['category_id']){
                                        $selected = "selected";
                                    }
                                    else{
                                        $selected = "";

                                    }
                            ?>

                                    <option <?=  $selected ?> value="<?php echo $row2['id'] ?>"> <?php echo $row2['category'] ?> </option>

                            <?php  }
                            } ?>
                        </select>
                    </div>



                


                    <div class="col-lg-6 mb-2">
                        <label class="form-label" for="image">Image <span class="text-danger">*</span>
                        </label>
                        <input type="file" class="form-control" id="userimage" name="new_image" accept="image/*">
                    <input type="hidden" class="form-control" value="<?= $row['product_image'] ?>" name="old_image" accept="image/*" required>                    </div>

                    <div class="col-lg-12 mb-2">
                        <label class="form-label" for="val-username">Description <span class="text-danger">*</span>
                        </label>
                        <textarea name="description" class="form-control" id=""  rows="5"><?= $row['product_description'];  ?></textarea>
                    </div>

                    <div class="offset-8 col-lg-4 mb-2">
                        <label for=""></label>

                        <button class="btn btn-success text-white btn-lg mt-2 w-100"> <i class="fa fa-edit"></i> Edit Product</button>
                    </div>

                </form>
            </div>

        </div>






    </div> <!--*** Main wrapper end *****-->

    <!-- footer include -->
    <?php require_once("./includes/footer.php")  ?>

    <!-- javascript links include -->
    <?php require_once("./includes/javascript-links.php")  ?>




</body>

</html>