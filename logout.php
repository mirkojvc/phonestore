<?php

@session_start();
if(isset($_SESSION['userId'])){
    unset($_SESSION['userId']);
    unset($_SESSION['roleId']);
    unset($_SESSION['username']);
    @session_destroy();
    header("Location: /");
}

?>