<table class="table table-bordered">
    <thead>
    <tr>
        <th>UserName</th>
        <th>email</th>
        <th>Title</th>
        <th>Message</th>
                    </tr>
    </thead>
    <tbody>
                <?php		
                    $message = getAllMessages($conn);
                    while($mes = mysqli_fetch_array($message)):
                ?>
    <tr>
        <td><?php echo $mes['name']; ?></td>
        <td><?php echo $mes['email']; ?></td>
        <td><?php echo $mes['title']; ?></td>
        <td><?php echo $mes['text']; ?></td>
    </tr>
    <?php endwhile; ?>
    </tbody>
</table>