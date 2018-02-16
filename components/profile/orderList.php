<?php


        $current_user = $_SESSION['userId'];
        $res = getCurrentUserOrders($conn, $current_user);
        while($order 			= mysqli_fetch_array($res)) :
        $resc 			= getUserCart($conn, $order['id']);
    ?>
	<table class="table table-bordered">
        <thead>
        <tr>
            <th>Product</th>
            <th>Title</th>
                        <th>Price</th>
            <th>Remove</th>
                        </tr>
        </thead>
        <tbody>
                    <?php		
                        if(mysqli_num_rows($resc) !== 0) :
                            $total_price 		= 0;
                            while($cart = mysqli_fetch_array($resc)) :
                                
                                $product 			= mysqli_fetch_array(getProduct($conn, $cart['productId']));
                                $total_price += $product['price'];
                                $img 					= getProductImage($conn, $product['id']);
                    ?>
        <tr>
            <td> <img width="60" src="/images/<?php echo $img['path']; ?>" alt="<?php echo $img['alt']; ?>"/></td>
            <td><?php  echo $product['title'];?></td>
            <td><?php  echo $product['price'];?></td>
                            <td>
                            <div class="" align = "center">
                                    <button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>
                            </div>
                            </td>
        </tr>
                            <?php 
                                endwhile;
                                endif;
                            ?>

            <tr>
            <td colspan="3" style="text-align:right"><strong>TOTAL</strong></td>
            <td class="label label-important" style="display:block"> <strong> <?php echo $total_price ?> </strong></td>
        </tr>
        </tbody>
    </table>
    <?php endwhile; ?>