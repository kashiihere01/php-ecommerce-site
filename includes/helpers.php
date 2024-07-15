<?php


function pp($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    //exit;
}

function getCategories($con)
{

    $sql = "SELECT * FROM categories";
    $result = mysqli_query($con, $sql);
    return $result;
}
function imageUrl($folder, $image) {
    return "admin/images/$folder/$image";
}

function getCategroyById($con, $id)
{
    $sql = "SELECT * FROM categories WHERE id = $id";
    $result = mysqli_query($con, $sql);
    $categroy = mysqli_fetch_assoc($result);
    return $categroy;
}


// all products
function getProducts($con, $category = null, $id = null)
{

    $sql = "SELECT * FROM products ";

    if ($category != null) {
        $sql .= "WHERE category = '$category' ";
    }

    if ($id != null && $category != null) {
        $sql .= "AND id = '$id' ";
    } else if ($id != null && $category == null) {
        $sql .= "WHERE id = '$id' ";
    }

    $result = mysqli_query($con, $sql);

    

    return $result;
}

function getImageUrl($folder, $image)
{
    return "admin/images/$folder/$image";
}

// feature products
function getFeatureProducts($con, $category = null, $id = null)
{

    $sql = "SELECT * FROM products LIMIT 8";
    $result = mysqli_query($con, $sql);
    return $result;
}
function getBestProducts($con, $category = null, $id = null)
{
    $sql = "SELECT * FROM products WHERE `status` = '2' ";

    if ($category != null) {
        $sql .= "WHERE category = '$category' ";
    }

    if ($id != null && $category != null) {
        $sql .= "AND id = '$id' ";
    } else if ($id != null && $category == null) {
        $sql .= "WHERE id = '$id' ";
    }
    $sql .= " LIMIT 8";

    $result = mysqli_query($con, $sql);
    return $result;
}
// latest products

function getLatestProducts($con)
{

    $sql_latest = "SELECT * FROM products ORDER BY created_at DESC LIMIT 10";

    $result_latest = mysqli_query($con, $sql_latest);


    return $result_latest;
}



function getnextProducts($con, $category = null, $id = null)
{

    $sql_all = "SELECT * FROM products LIMIT 8 OFFSET 4";
    $result_all = mysqli_query($con, $sql_all);
    return $result_all;
}
