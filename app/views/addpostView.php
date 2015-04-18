<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main container row">
        <section class="eight columns">
            <form action="" method="POST">
                <input type="text" name="postTitle" placeholder="Enter title" /> <br />
                <textarea name="postContent" placeholder="Enter post content"></textarea> <br />
                <input type="submit" name="postInput" placeholder="Submit" />
            </form>
        </section>

        <?php require_once '../app/incl/sidebar.php'; ?>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>