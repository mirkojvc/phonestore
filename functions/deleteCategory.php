<?php
include "../components/connection.php";
session_start();
if(isset($_SESSION['roleId']) && $_SESSION['roleId'] === '2' && !empty($_REQUEST['id'])) {

    $id = $_REQUEST['id'];
    $deleteCategory = sprintf('DELETE FROM ProductCategories WHERE id = %s', $id);

    $res = mysqli_query($conn, $deleteCategory);
    var_dump($conn);
    header("Location: /adminCategories");
} else {
    header("Location: /");
}

?>