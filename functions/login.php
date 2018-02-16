<?php
include "../components/connection.php";
if(isset($_REQUEST['login_user__submit'])) {
    $error          = "";
    $inputEmail     = $_REQUEST['inputEmail'];
    $inputPassword  = $_REQUEST['inputPassword'];
    $roleId         = 1;
    if(empty($inputEmail)) {
        $error .= "Molimo unesite Email. ";
    } else if (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $inputEmail)) {
        $error .= "E-mail nije validnog formata. ";
    } else {
        $email      = $inputEmail;
    }

    if(empty($inputPassword)) {
        $error .= "Molimo unesite sifru. ";
    } else {
        $password   = md5($inputPassword);
    }

    if($error !== "") {
        header('Location: /login?errorl='.$error);
    } else {
        
        $sql = sprintf("SELECT * FROM User WHERE email = '%s' AND password = '%s'",$email, $password);

        $res = mysqli_query($conn, $sql);
		if(mysqli_num_rows($res) == 1){
			$user = mysqli_fetch_array($res);
			session_start();
			$_SESSION['username']   = $user['username'];
			$_SESSION['roleId']     = $user['roleId'];
            $_SESSION['userId']     = $user['id'];
            header('Location: /');
			
		} else {
			echo "Niste registrovani!";
		}
    }
}

?>