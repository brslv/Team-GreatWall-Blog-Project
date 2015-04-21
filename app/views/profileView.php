<?php require_once '../app/incl/header-tiny.php'; ?>
    <main class="main container row">
        <section class="twelve columns">
            <article>
                <div><h2 class="profile-name u-text-center"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></h2></div>
                <h4 class="profile-msg u-text-center">
                    <?php if($_SESSION['role'] == 'admin') : ?>
                        Hello, <?php echo $_SESSION['firstname']; ?>. I don't know if you're aware, but you appear to be the admin of this blog. <a href="<?php echo Config::get('paths', 'root') ?>admin">So, go and rule</a>!
                    <?php else : ?>
                        Hello, <?php echo $_SESSION['firstname']; ?>. You're currently in your profile. Here you can track your activity and tweak your personal information!
                    <?php endif; ?>
                </h4>
                
                
                <div class="page-content row">
                    <div class="eight columns">
                        <h5 class="u-bold">Current information: </h5>
                        Username: <?php echo $_SESSION['username']; ?> <br />
                        Email: <?php echo $_SESSION['email']; ?><br />
                        Role: <?php echo $_SESSION['role']; ?> <br /><br />
                        
                        <h5 class="u-bold">Latest 5 comments: </h5>
                        <p>This is a comment</p>
                        <p>This is a longer comment Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                    
                    <div class="four columns">
                        <h5>Options: </h5>
                        <ul class="non-bullet">
                            <li><a href="">Change username</a></li>
                            <li><a href="">Change password</a></li>
                        </ul>
                    </div>
                </div>
                
            </article>
            </div>
        </section>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>