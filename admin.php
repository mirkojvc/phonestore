<!DOCTYPE html>
<html lang="en">
	<?php include "components/head.php" ; ?>
<body>
    <?php
        if(!isset($_SESSION['userId']) || $_SESSION['roleId'] !== '2') {
            header('Location: /');
        }
    ?>
	<?php include "components/header.php";?>
	<?php //include "components/index/slider.php";?>
<div id="mainBody">
	<div class="container">
		<div class="row">

	<!-- Sidebar end=============================================== -->

			<div class="span12">	

            <?php //var_dump($_SESSION['roleId']);  ?>

            <h2>Welcome admin</h2>
            
			</div>
		</div>
	</div>
</div>
<?php include "components/footer.php"; ?>
<?php include "components/usedScripts.php";?>
</body>
</html>