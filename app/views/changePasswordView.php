<?php require_once '../app/incl/header-tiny.php'; ?>

    <main class="main container row">
        <section class="twelve columns">
            <article class="container u-text-center">
                <div><h2>Change your password</h2></div>

                <div class="page-content">
                    <?php if($data['message'] != null) : ?>
                        <div class="msg">
                            <?php echo $data['message']; ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post">
					    <input type="password" name="password" placeholder="Enter new password"/> <br />
					    <input type="submit" name="submit" value="Change password" />
					</form>
                </div>
            </article>
            </div>
        </section>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>