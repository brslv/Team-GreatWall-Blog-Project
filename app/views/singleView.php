<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main container row">
        <section class="twelve columns">
            <article class="post">
                <h3 class="u-bold">
                    <?php echo $data[0]['title'] ?>
                </h3>
                
                <div class="post-meta u-upper u-bold">
                    Post added by <a href=""><?php echo $data[0]['author_username']; ?></a> 
                    in <a href=""><?php echo $data[0]['category']; ?></a> 
                    on <a href=""><?php echo $data[0]['publish_date']; ?></a>
                </div>
                
                <div class="post-content">
                    <?php echo $data[0]['content'] ?>
                </div>
            </article>
        </section>
    
    </main>

    <?php require_once '../app/incl/comments.php'; ?>
    
<?php require_once '../app/incl/footer.php'; ?>

