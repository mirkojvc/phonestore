<?php
include "../components/connection.php";
session_start();
if(isset($_SESSION['roleId']) && $_SESSION['roleId'] === '2' && !empty($_REQUEST['id'])) {

    $id = $_REQUEST['id'];
    $deleteImages = sprintf('DELETE FROM ProductImages WHERE productId = %s', $id);
    $deleteProduct = sprintf('DELETE FROM Product WHERE id = %s', $id);

    $res = mysqli_query($conn, $deleteImages);
    $res = mysqli_query($conn, $deleteProduct);
    var_dump($conn);
    header("Location: /adminProducts");
} else {
    header("Location: /");
}

?>