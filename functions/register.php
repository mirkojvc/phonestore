<?php
include "../components/connection.php";
if(isset($_REQUEST['register_user__submit'])) {
    $error          = "";
    $inputEmail     = $_REQUEST['inputEmail'];
    $inputUsername  = $_REQUEST['inputUsername'];
    $inputPassword  = $_REQUEST['inputPassword'];
    $roleId         = 1;
    if(empty($inputEmail)) {
        $error .= "Molimo unesite Email. ";
    } else if (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $inputEmail)) {
        $error .= "E-mail nije validnog formata. ";
    } else {
        $email      = $inputEmail;
    }

    if(empty($inputUsername)) {
        $error .= "Molimo unesite korisnicko ime. ";
    } else {
        $username   = $inputUsername;
    }

    if(empty($inputPassword)) {
        $error .= "Molimo unesite sifru. ";
    } else {
        $password   = md5($inputPassword);
    }

    if($error !== "") {
        header('Location: /login?error='.$error);
    } else {
        
        $sql = sprintf("INSERT INTO User (username, password, roleId, email)
        VALUES ('%s', '%s', '%d', '%s')", $username, $password, $roleId, $inputEmail);

        if (mysqli_query($conn, $sql)) {
            $usersql  =  sprintf("SELECT * FROM User WHERE username = '%s'",$inputUsername);
            $userquer = mysqli_query($conn, $sql);
            if(mysqli_num_rows($userquer) == 1){
                $user = mysqli_fetch_array($userquer);
                session_start();
                $_SESSION['username']   = $user['username'];
                $_SESSION['roleId']     = $user['roleId'];
                $_SESSION['userId']     = $user['id'];
                header('Location: /');
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    }
}

?>