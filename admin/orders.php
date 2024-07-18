<?php require_once("./auth.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>View Orders</title>

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
                <div class="col-md-4">
                    <h3> <i class="fa fa-eye text-success"></i>View Orders</h3>
                </div>
                <hr>
            
                <div class="col-md-8">
                    <?php

                    if (!empty($_SESSION['success'])) {
                        $msg = $_SESSION['success'];
                        echo " <div class='alert alert-success alert-dismissible fade show notification'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                            </button> <strong>Congratulation! </strong> $msg</div>";
                    }
                    unset($_SESSION['success']);
                    ?>

                </div>
            </div>

            <hr>
       
            

            <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Shipping Address</th>
                            <th>city</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php

                        require_once("./db-con.php");

                        $get_users = "SELECT 
    orders.*,
    products.product_name AS product_name,
    products.product_price AS product_price,
    products.product_image AS product_image
FROM 
    orders
JOIN 
    products ON orders.product_id = products.id
WHERE 
    orders.user_id = $_SESSION[user_id]
ORDER BY 
    orders.order_date DESC

"
                               ;

                        $result = mysqli_query($con, $get_users);
 
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {


                        ?>

                                <tr>
                                    <td><img src="./images/product/<?php echo $row['product_image'] ?>" alt="Product Image" height="60px"></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['mobile'] ?></td> 
                                    <td><?= $row['address'] ?></td>
                                    <td><?= $row['city'] ?></td> 
                                    <td>
                       <?php
                        echo "<span class='badge bg-success text-white'>$row[status]</span>";
                
                     ?></td>
                  <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success text-white dropdown-toggle" data-toggle="dropdown">Actions</button>
                                            <div class="dropdown-menu">

                                                <a class="dropdown-item" href="on-the-way.php?id=<?= $row['id'] ?>"> On the Way</a>
                                                <a class="dropdown-item" href="delivered.php?id=<?= $row['id'] ?>"> Delivered</a>
                                                <a class="dropdown-item" href="delete-order.php?id=<?= $row['id'] ?>"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
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
                $(".notification").remove();
            }, 3000);

        })
    </script>


</body>

</html>