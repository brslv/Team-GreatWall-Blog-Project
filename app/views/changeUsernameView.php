<?php require_once Config::get('paths', 'incl') . 'header-tiny.php'; ?>

    <main class="main container row">
        <section class="twelve columns">
            <article class="container u-text-center">
                <div><h2>Change your username</h2></div>

                <div class="page-content">
                    <?php if($data['message'] != null) : ?>
                        <div class="msg">
                            <?php echo $data['message']; ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post">
						<input type="text" name="newUserName" placeholder="Enter new username"/> <br />
						<input type="submit" name="submit" value="Change username" />
					</form>
                </div>
            </article>
            </div>
        </section>
    </main>
    
<?php require_once Config::get('paths', 'incl') . 'footer.php'; ?>