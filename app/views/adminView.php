<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main container row">
        <section class="eight columns">
            <h5>Add new post: </h5>
          
            <?php if($data[0] != null) : ?>
                <div class="msg">
                    <?php echo $data[0]; ?>
                </div>
            <?php endif; ?>
            
            <form action="" method="POST">
                <input type="text" name="postTitle" class="full-input" placeholder="Enter title" /> <br />
                <textarea name="postContent" class="full-textarea" placeholder="Enter post content"></textarea> <br />
                <?php // TODO: Add category select option. ?>
                <label for="postVisibility">Post visibility: </label>
                <select name="postVisibility">
                    <option value="1">Public</option>
                    <option value="0">Private</option>
                </select>
                <br />
                <input type="submit" name="postSubmit" value="Submit post" />
            </form>
        </section>
        
        <section class="four columns">
            <h5>More options: </h5>
            
            <ul>
                <li><a href="">Manage posts</a></li>
                <li><a href="">Manage categories</a></li>
                <li><a href="">Manage pages</a></li>
            </ul>
        </section>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>