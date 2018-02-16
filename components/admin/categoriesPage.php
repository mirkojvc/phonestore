<form action="functions/createCategory" method = "post">
    <div class="control-group">
        <label class="control-label" for="inputEmail">Category name</label>
        <div class="controls">
            <input class="span3"  type="text" id="categoryName" name="categoryName" placeholder="Name">
        </div>
    </div>
    <div class="controls">
        <button type="submit" class="btn block" name = "create_category__submit">Create</button>
    </div>
</form>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Category name</th>

        <th>update</th>
        <th>delete</th>
                    </tr>
    </thead>
    <tbody>
                <?php		
                    $category = getAllCategories($conn);
                    while($cat = mysqli_fetch_array($category)):
                ?>
    <tr>
        <td><?php echo $cat['category_name']; ?></td>
        <td>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_<?php echo $cat['id'] ?>">
            Update
        </button>
        </td>
        <td><a href = "functions/deleteCategory?id=<?php echo $cat['id']?>" style ="color:red;">delete</a></td>
    </tr>

        <!-- Modal -->
    <div class="modal fade" id="modal_<?php echo $cat['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Izmena</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form method="post" action= "functions/updateCategory">
        <div class="modal-body">
                        <input type = "text" id = "category_name" name = "category_name" value = <?php echo $cat["category_name"] ?> />
                        <input type = "hidden" id = "category_id" name = "category_id"     value = <?php echo $cat["id"] ?> />
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name = "update_category__submit" class="btn btn-primary">Save changes</button>
        </div>            
        </form>
        </div>
    </div>
    </div>

    <?php endwhile; ?>
    </tbody>
</table>




