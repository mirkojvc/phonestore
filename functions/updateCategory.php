<?php 
session_start();
 if(isset($_SESSION['roleId']) && $_SESSION['roleId'] === '2' && isset($_REQUEST['update_category__submit'])) {
    if(isset($_REQUEST['category_name']) && isset( $_REQUEST['category_id'])) {
        include "../components/connection.php";
        $new_name = $_REQUEST['category_name'];
        $id       = $_REQUEST['category_id'];
        $sql = sprintf("UPDATE ProductCategories SET category_name = '%s' WHERE id = %s",$new_name, $id);

        $run = mysqli_query($conn, $sql);
        if($run) {
            header("Location: /adminCategories");
        }
    }


 }
?>
