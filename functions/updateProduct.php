<?php 
session_start();
 if(isset($_SESSION['roleId']) && $_SESSION['roleId'] === '2' && isset($_REQUEST['update_product__submit'])) {
    if(isset($_REQUEST['product_title']) && isset( $_REQUEST['product_id'])) {
        include "../components/connection.php";
        $new_name = $_REQUEST['product_title'];
        $id       = $_REQUEST['product_id'];
        $sql = sprintf("UPDATE Product SET title = '%s' WHERE id = %s",$new_name, $id);

        $run = mysqli_query($conn, $sql);
        if($run) {
            header("Location: /adminProducts");
        }
    }


 }
?>
