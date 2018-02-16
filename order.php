<?php
    session_start();
    include "components/connection.php";
    if(!isset($_SESSION['userId'])){
        header("Location: /");
    }

    if(!isset($_REQUEST['id'])) {
        header("Location: /");
    }

    $user_id =  $_SESSION['userId'];
    $order_id = $_REQUEST['id'];

    $sql = sprintf('UPDATE UserOrder SET status = 1 WHERE id = %d AND userId = %d', $order_id, $user_id);
    $update = mysqli_query($conn, $sql);
    if($update) {
        header("Location: /profile");
    } else {
        header("Location: /cart?error=nije uspeo unos");
    }
?>