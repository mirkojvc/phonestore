<!DOCTYPE html>
<html lang="en">
	<?php include "components/head.php" ; ?>
<body>
    <?php
        if(!isset($_SESSION['userId'])) {
            header('Location: /');
        }
    ?>
	<?php include "components/header.php";?>
	<?php //include "components/index/slider.php";?>
<div id="mainBody">
	<div class="container">
		<div class="row">

	<!-- Sidebar ================================================== -->

			<?php include "components/sidebar.php" ;?>

	<!-- Sidebar end=============================================== -->

			<div class="span9">	

            <?php include "components/profile/orderList.php"; ?>
            
			</div>
		</div>
	</div>
</div>
<?php include "components/footer.php"; ?>
<?php include "components/usedScripts.php";?>
</body>
</html>