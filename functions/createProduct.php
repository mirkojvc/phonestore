<?php
include "../components/connection.php";
session_start();
if(isset($_SESSION['roleId']) && $_SESSION['roleId'] === '2' && isset($_REQUEST['create_product__submit'])) {

    $path = "../images/";
    $product_title      = $_REQUEST['product_title'];
    $product_text       = $_REQUEST['product_text'];
    $product_price      = $_REQUEST['product_price'];
    $product_featured   = $_REQUEST['product_featured'];
    $product_category   = $_REQUEST['product_category'];
    $createProduct = sprintf('INSERT INTO Product (title, text, categoryId, featured, price) 
    VALUES("%s","%s","%s","%s","%s")', $product_title, $product_text, $product_category , $product_featured ,$product_price);
    $res            = mysqli_query($conn, $createProduct);
    $productId      = mysqli_insert_id($conn);
    $Picture[0]     = $_FILES["imageone"];
    $Picture[1]     = $_FILES["imagetwo"];
    $Picture[2]     = $_FILES["imagethree"];

    for($i = 0; $i<3; $i++) {
        $picture = $Picture[$i];
        $imagename =explode(".",$picture["name"]);
        $newfilename = rand(1,99999). '.' . end($imagename);
        if (move_uploaded_file($picture["tmp_name"], $path.$newfilename)) {
            $insertImages = sprintf("INSERT INTO ProductImages(productId, alt, path)
            VALUES('%s','%s','%s')", $productId, $product_title, $newfilename);

            $images  = mysqli_query($conn, $insertImages);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    header("Location: /adminProducts");
} else {
    header("Location: /");
}

?>