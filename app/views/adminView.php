<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main container row">
        <section class="eight columns">
            <?php // TODO: Style the form. ?>
            <h5>Add new post: </h5>
          
            <?php 
                // TODO: style the message.
                echo $data[0]; 
            ?>
            
            <form action="" method="POST">
                <input type="text" name="postTitle" placeholder="Enter title" /> <br />
                <textarea name="postContent" placeholder="Enter post content"></textarea> <br />
                <input type="submit" name="postSubmit" placeholder="Submit" />
            </form>
        </section>
        
        <section class="four columns">
            <h5>More options: </h5>
            
            <ul>
                <li><a href="">Manage posts</a></li>
                <li><a href="">Manage categories</a></li>
                <li><a href="">Manage tags</a></li>
            </ul>
        </section>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>