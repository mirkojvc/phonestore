<!DOCTYPE html>
<html lang="en">
	<?php include "components/head.php" ; ?>
<body>
	<?php include "components/header.php";?>
	<?php //include "components/index/slider.php";?>
<div id="mainBody">
	<div class="container">
		<div class="row">

	<!-- Sidebar ================================================== -->

			<?php include "components/sidebar.php" ;?>

	<!-- Sidebar end=============================================== -->

			<div class="span9">	

            <?php include "components/productCategory/productList.php"; ?>
            
			</div>
		</div>
	</div>
</div>
<?php include "components/footer.php"; ?>
<?php include "components/usedScripts.php";?>
</body>
</html>