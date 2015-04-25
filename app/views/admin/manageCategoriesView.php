<h5>Add new category</h5>
<?php if($data['msg'] != null) : ?>
    <div class="msg">
        <?php echo $data['msg']; ?>
    </div>
<?php endif; ?>

<form action="" method="POST">
        <input name="categoryTitle" placeholder="Enter category"/input> <br />
        <input type="submit" name="categorySubmit" value="Submit category" />
</form>