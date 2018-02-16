<form action="functions/createProduct" method = "post" enctype="multipart/form-data">
    <div class="control-group">
        <label class="control-label" for="inputEmail">product title</label>
        <div class="controls">
            <input class="span3"  type="text" id="product_title" name="product_title" placeholder="Title">
        </div>
        <label class="control-label" for="inputEmail">product text</label>
        <div class="controls">
            <input class="span3"  type="text" id="product_text" name="product_text" placeholder="Text">
        </div>
        <label class="control-label" for="inputEmail">product price</label>
        <div class="controls">
            <input class="span3"  type="text" id="product_price" name="product_price" placeholder="Price">
        </div>      
        <label class="control-label" for="inputEmail">product category</label>
        <div class="controls">
            <select name = "product category">
                <?php		
                    $category = getAllCategories($conn);
                    while($cat = mysqli_fetch_array($category)):
                ?>
                    <option value = <?php echo $cat['id']?>><?php echo $cat['category_name']?></option>
                <?php endwhile; ?>
            </select>
        </div>      
        <label class="control-label" for="inputEmail">product featured</label>
        <div class="controls">
            <input   type="radio" id="product_featured" name="product_featured" value = "1" placeholder="Price">Featrured
            <input   type="radio" id="product_featured" name="product_featured" value = "0" placeholder="Price">not Featrured
        </div>
        <label class="control-label" for="inputEmail">product images</label>
        <div class="controls">
            <input type="file" name="imageone" id="imageone">
            <input type="file" name="imagetwo" id="imagetwo">
            <input type="file" name="imagethree" id="imagethree">
        </div>
    </div>
    <div class="controls">
        <button type="submit" class="btn block" name = "create_product__submit">Create</button>
    </div>
</form>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Title</th>
        <th>text</th>
        <th>price</th>
        <th>featured</th>

        <th>update</th>
        <th>delete</th>
                    </tr>
    </thead>
    <tbody>
                <?php		
                    $product = getAllProducts($conn);
                    while($pro = mysqli_fetch_array($product)):
                ?>
    <tr>
        <td><?php echo $pro['title']; ?></td>
        <td><?php echo $pro['text']; ?></td>
        <td><?php echo $pro['price']; ?></td>
        <td><?php echo $pro['featured']; ?></td>
        <td>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_<?php echo $pro['id'] ?>">
            Update
        </button>
        </td>
        <td><a href = "functions/deleteProduct?id=<?php echo $pro['id']?>" style ="color:red;">delete</a></td>
    </tr>

        <!-- Modal -->
    <div class="modal fade" id="modal_<?php echo $pro['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Izmena</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form method="post" action= "functions/updateProduct">
        <div class="modal-body">
                        <textarea    id = "product_title" name = "product_title"><?php echo $pro["title"] ?></textarea>
                        <input type = "hidden" id = "product_id" name = "product_id"     value = <?php echo $pro["id"] ?> />
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name = "update_product__submit" class="btn btn-primary">Save changes</button>
        </div>            
        </form>
        </div>
    </div>
    </div>

    <?php endwhile; ?>
    </tbody>
</table>




