<?php
include "../components/connection.php";
session_start();
if(isset($_SESSION['roleId']) && $_SESSION['roleId'] === '2' && isset($_REQUEST['categoryName'])) {

    $name = $_REQUEST['categoryName'];
    $createCategory = sprintf('INSERT INTO ProductCategories (category_name) 
    VALUES("%s")', $name);

    $res = mysqli_query($conn, $createCategory);
    header("Location: /adminCategories");
} else {
    header("Location: /");
}

?>