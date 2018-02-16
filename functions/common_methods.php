<?php

		function createNewCategory($conn, $category_name) {
			$createCategory = sprintf('INSERT INTO ProductCategories (category_name) 
			VALUES(%s)', $category_name);

			return mysqli_query($conn, $createCategory);
		}
		function getCurrentUserOrder($conn, $userId) {
			$check_order = sprintf('SELECT * FROM UserOrder WHERE userId = %d AND status = 0', $userId);
			$res = mysqli_query($conn, $check_order);

			return $res;
		}
		function getCurrentUserOrders($conn, $userId) {
			$check_order = sprintf('SELECT * FROM UserOrder WHERE userId = %d AND status = 1', $userId);
			$res = mysqli_query($conn, $check_order);

			return $res;
		}

		function getUserCart($conn, $order_id) {
			$query 	= sprintf('SELECT * FROM UserCart WHERE orderId = %s', $order_id);
			
			$res 	= mysqli_query($conn, $query);

			return $res;
		}

		function getProduct($conn, $product_id) {
			$query = sprintf('SELECT * FROM Product WHERE id = %s', $product_id);
			$res   = mysqli_query($conn, $query);
			return $res;
		}

		function getProductImage($conn, $product_id) {
			$getimg = sprintf('SELECT * FROM ProductImages WHERE productId = %s LIMIT 1', $product_id);
            $images = mysqli_query($conn, $getimg);

            return  mysqli_fetch_array($images);
		}

		function checkIfProductCart($conn, $orderId, $productId) {
			$check = sprintf('SELECT * FROM UserCart WHERE orderId = %s AND productId = %s', $orderId, $productId);
			$res = mysqli_query($conn, $check);

			return mysqli_num_rows($res);
		}

		function createUserOrder($conn, $userId) {
			$create_order = sprintf('INSERT INTO UserOrder (userId, status) 
			VALUES(%s, %s)', $userId, 0);

			return mysqli_query($conn, $create_order);
		}

		function createUserCart($conn, $product_id,$order_id) {
			$insert_cart = sprintf('INSERT INTO UserCart (productId, orderId)
			VALUES(%s, %s)',$product_id, $order_id);
			
			return mysqli_query($conn, $insert_cart);
		}

		function getAllOrders($conn) {
			$getAll = sprintf('SELECT * FROM UserOrder');

			return mysqli_query($conn, $getAll);
		}

		function getUser ($conn, $userId) {
			$user = sprintf('SELECT * FROM User WHERE id = %d', $userId);
			
			return mysqli_query($conn, $user);
		}

		function getAllCategories($conn) {

			$getAll = sprintf('SELECT * FROM ProductCategories');

			return mysqli_query($conn, $getAll);
		}

		function getAllMessages($conn) {

			$getAll = sprintf('SELECT * FROM Messages');

			return mysqli_query($conn, $getAll);
		}

		function getAllProducts($conn) {

			$getAll = sprintf('SELECT * FROM Product');

			return mysqli_query($conn, $getAll);
		}
?>