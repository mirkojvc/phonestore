<?php
			if(!isset($_REQUEST['id'])) {
				echo 'Invalid query';die;
			} else if(!preg_match("/[0-9]+/",$_REQUEST['id'])) {
				echo 'Invalid query';die;
			} else {
				$category_id = $_REQUEST['id'];
				$sqlk 			= sprintf('SELECT * FROM ProductCategories WHERE id =%s',$category_id);
				$resk 			= mysqli_query($conn, $sqlk);
				$kategorija = mysqli_fetch_array($resk);
			}
?>
<div class="span9">
    <h3><?php echo $kategorija['category_name']; ?></h3>
	<hr class="soft"/>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">

		    <?php
        $sql = sprintf('SELECT * FROM Product  WHERE categoryId = %s', $category_id);
        $res = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($res)) :
            $getimg = 'SELECT * FROM ProductImages WHERE productId = '.$row['id'].' LIMIT 1';
            $images = mysqli_query($conn, $getimg);

            $img = mysqli_fetch_array($images);
    ?>
			<li class="span3">
			  <div class="thumbnail">
				<a href="product?id=<?php echo $row['id']; ?>"><img src="/images/<?php echo $img['path'] ?>" alt="<?php echo $img['alt'] ?>"/></a>
				<div class="caption">
				  <h5><?php echo $row['title']; ?></h5>
				   <h4 style="text-align:center">
					 	<a class="btn" href="product?id=<?php echo $row['id']; ?>">
						 <i class="icon-zoom-in"></i>
						</a>
						<a class="btn" href="cart?id=<?php echo $row['id']; ?>">Add to
							<i class="icon-shopping-cart"></i>
						</a>
						<a class="btn btn-primary" href="#"><?php echo $row['price']; ?>$</a></h4>
				</div>
			  </div>
			</li>
			<?php endwhile ?>
		  </ul>
	<hr class="soft"/>
	</div>
</div>
	<div class="pagination">
			<ul>
			<li><a href="#">&lsaquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">&rsaquo;</a></li>
			</ul>
			</div>
			<br class="clr"/>
</div>
</div>
</div>
</div>