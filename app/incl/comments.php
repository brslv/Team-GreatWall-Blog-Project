<section class="container comments-section">
        <h3>Comments: </h3>
        <?php
        foreach ($data['comments'] as $comment):
        ?>

        <div class="comment">
            <h5 class="commentor-name"><?php echo $comment->author_id; ?></h5>
            <div class="comment-content">
                <?php echo $comment->content ?>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="add-comment-section">
            <h3>Add comment: </h3>
            <form action="" method="POST" class="add-comment-form">
                <textarea name="commentContent" placeholder="Type in here something..."></textarea>
                <input type="submit" name="commentSubmit" value="Submit Comment"/>
            </form>
<!--            <h5>You should be registered to leave comments, bro. Do it from <a href="">here</a>.</h5>-->
        </div>
    </section>