<ul class="thumbnails">
    <?php
        $sql = 'SELECT * FROM Product  WHERE featured = 1';
        $res = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_array($res)) :
            $getimg = 'SELECT * FROM ProductImages WHERE productId = '.$row['id'].' LIMIT 1';
            $images = mysqli_query($conn, $getimg);

            $img = mysqli_fetch_array($images);
    ?>

    <li class="span3">
        <div class="thumbnail">
        <a  href="/product?id=<?php echo $row['id'] ?>"><img src="/images/<?php echo $img['path'] ?>" alt="<?php echo $img['alt'] ?>"/></a>
        <div class="caption">
            <h5><?php echo $row['title'] ?></h5>
            
            <h4 style="text-align:center"><a class="btn" href="/product?id=<?php echo $row['id'] ?>">
            <i class="icon-zoom-in"></i></a>
            <a class="btn" href="cart?id=<?php echo $row['id'] ?>">Add to <i class="icon-shopping-cart"></i></a>
            <a class="btn btn-primary" href="#"><?php echo $row['price'] ?>$</a></h4>
        </div>
        </div>
    </li>
    <?php endwhile ?>
</ul>	