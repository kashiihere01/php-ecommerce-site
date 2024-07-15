<div class="row">
    <!-- all categories -->
     <?php
            require_once("db-con.php");
            $category_count_query = "SELECT COUNT(*) AS category FROM categories";
            $category_count_result = mysqli_query($con, $category_count_query);
            $category_count_row = mysqli_fetch_assoc($category_count_result);
            $all_categories = $category_count_row['category'];

        
            $product_count_query = "SELECT COUNT(*) AS product FROM products";
            $product_count_result = mysqli_query($con, $product_count_query);
            $product_count_row = mysqli_fetch_assoc($product_count_result);
            $all_product = $product_count_row['product'];


            ?> 
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
            <div class="card-body">
                <h3 class="card-title text-white">Categories</h3>
                <div class="d-inline-block">
<h2 class="text-white"><?= $all_categories ?></h2>

                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-2">
            <div class="card-body">
                <h3 class="card-title text-white">All Products</h3>
                <div class="d-inline-block">
                    <h2 class="text-white"><?= $all_product ?></h2>
                
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-money-bill"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-3">
            <div class="card-body">
                <h3 class="card-title text-white">New Customers</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">4565</h2>
                    <p class="text-white mb-0">Jan - March 2019</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-4">
            <div class="card-body">
                <h3 class="card-title text-white">Customer Satisfaction</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">99%</h2>
                    <p class="text-white mb-0">Jan - March 2019</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
            </div>
        </div>
    </div>
</div>