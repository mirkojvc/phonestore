<div id="sidebar" class="span3">
    
    <!-- END Sidebar cart =============================================== !-->

    <!-- Sidebar menu =============================================== !-->

    <ul id="sideManu" class="nav nav-tabs nav-stacked">
        <li class="subMenu open"><a> Proizvodjac</a>
            <ul>
            <?php
                $sql = 'SELECT * FROM ProductCategories';
                $res = mysqli_query($conn, $sql);
                while($red = mysqli_fetch_array($res)) : 
            ?>
            <li><a href="productCategory?id=<?php echo $red['id'];?>"><i class="icon-chevron-right"></i><?php echo $red['category_name'];?> </a></li>
            <?php
				endwhile;
			?>
            </ul>
        </li>
    </ul>


    <!-- END Sidebar menu =============================================== !-->

</div>