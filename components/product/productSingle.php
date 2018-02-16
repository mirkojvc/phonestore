<?php
			if(!isset($_REQUEST['id'])) {
				echo 'Invalid query';die;
			} else if(!preg_match("/[0-9]+/",$_REQUEST['id'])) {
				echo 'Invalid query';die;
			} else {
                $id = $_REQUEST['id'];
                $sql = sprintf('SELECT * FROM Product  WHERE id = %s', $id);
                $res = mysqli_query($conn, $sql);
        
                $row = mysqli_fetch_array($res);
                    $getimg = 'SELECT * FROM ProductImages WHERE productId = '.$row['id'];
                    $images = mysqli_query($conn, $getimg);
        
                    //$img = mysqli_fetch_array($images);
			}
?>
<div class="row">	  
    <div id="gallery" class="span3">                   
            <?php
                $imge = mysqli_fetch_array($images);
            ?>
        <a href="/images/<?php echo $imge['path'];?>" title="<?php echo $row['title']; ?>">
            <img src="/images/<?php echo $imge['path'];?>" style="width:100%" alt="<?php echo $rerows['title']; ?>"/>
        </a>
        <div id="differentview" class="moreOptopm carousel slide">
            <div class="carousel-inner">
                <div class="item active">
                    <?php
                    while($img = mysqli_fetch_array($images)) :
                    ?>
                    <a href="/images/<?php echo $img['path'];?>"> <img style="width:29%" src="/images/<?php echo $img['path'];?>" alt=""/></a>
                    <?php endwhile ?>
                </div>
                <div class="item">
                    <?php
                    while($img = mysqli_fetch_array($images)) :
                    ?>
                    <a href="/images/<?php echo $img['path'];?>"> <img style="width:29%" src="/images/<?php echo $img['path'];?>" alt=""/></a>
                    <?php endwhile ?></div>
            </div>
        <!--  
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
        -->
        </div>
    </div>
    <div class="span6">
        <h3><?php echo $row['title']; ?>  </h3>
        <hr class="soft"/>
        <form class="form-horizontal qtyFrm" method="post" action = "/cart?id=<?php echo $row['id']; ?>">
            <div class="control-group">
                <label class="control-label"><span><?php echo $row['price']; ?>$</span></label>
                <div class="controls">
                    <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart
                    <i class=" icon-shopping-cart"></i></button>
                </div>
            </div>
        </form>
    
        <hr class="soft"/>
        <hr class="soft clr"/>
        <p><?php echo $row['text']; ?>
        </p>
        <hr class="soft"/>
    </div>
</div>