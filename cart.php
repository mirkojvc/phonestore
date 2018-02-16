<!DOCTYPE html>
<html lang="en">
	<?php
		include "components/head.php" ;
	?>
	<?php

		$error = "";
		if(isset($_SESSION['userId'])) {
			if(isset($_REQUEST['id'])){
				$current_user 	= $_SESSION['userId'];
				$product_id 	= $_REQUEST['id'];
				if(preg_match('/[0-9]+/',$product_id)) {
					$res = getCurrentUserOrder($conn, $current_user);
					if(mysqli_num_rows($res) === 1) {
						$order 			= mysqli_fetch_array($res);
						$check 			= checkIfProductCart($conn, $order['id'], $product_id);
						if($check !== 1) {
							$insert_cart 	= createUserCart($conn, $product_id, $order['id']);
							if(!$insert_cart) {
								$error.= "nije uspeo unos u korpu";
							}
						} else {
							$error.=  "proizvod postoji u korpi";
						}

					} else {
						$order = createUserOrder($conn, $current_user);
						if(!$order) {
							echo "Nije kreiran order"; die;
						} else {
							$order 			= getCurrentUserOrder($conn, $current_user);
							$order 			= mysqli_fetch_array($order);
							$check 			= checkIfProductCart($conn, $order['id'], $product_id);
							if($check !== 1) {
								$insert_cart 	= createUserCart($conn, $product_id, $order['id']);		
								if(!$insert_cart) {
									$error.=  "Nije uneto u cart";
								}
							} else {
								$error.=  "proizvod postoji u korpi";
							}
						}
					}
				} else {
					$error.=  "invalid id";
				}
			}
		} else {
			header('Location: /login');
		}
	?>
<body>
	<?php include "components/header.php";?>
<div id="mainBody">
	<div class="container">
		<div class="row">

	<!-- Sidebar ================================================== -->

			<?php include "components/sidebar.php" ;?>

	<!-- Sidebar end=============================================== -->

			<div class="span9">	

            <?php include "components/cart/cartPage.php"; ?>
            
			</div>
		</div>
	</div>
</div>
<?php include "components/footer.php"; ?>
<?php include "components/usedScripts.php";?>
</body>
</html>