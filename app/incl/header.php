<!DOCTYPE html>
<html>
    <meta charset="utf-8" />
    <title>This is the blog.</title>
    
    <!-- HARDCODE THE STYLE URL: -->
    <link rel="stylesheet" href="http://localhost/sites/SUProject/1/public/css/style.css" type="text/css"  />
    <script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
        });
    </script>
    
<body>
    <header class="header u-text-center">
        <div class="container">
            <nav class="top-nav nav">
                <ul class="u-upper u-bold">
                    <?php //TODO: Dynamically generate menu ?>
                    <li><a href="<?php echo Config::get('paths', 'root') ?>page/">Home</a></li>
                    <li><a href="<?php echo Config::get('paths', 'root') ?>page/">About</a></li>
                    <li><a href="<?php echo Config::get('paths', 'root') ?>page/">Contacts</a></li>
                    <?php if(!isset($_SESSION['username'])) : ?>
                        <li><a href="<?php echo Config::get('paths', 'root') ?>user/login">Login</a></li>
                        <li><a href="<?php echo Config::get('paths', 'root') ?>user/register">Register</a></li>
                    <?php else : ?>
                        <li><a href="<?php echo Config::get('paths', 'root') ?>user/logout">Logout (<?php echo $_SESSION['username']; ?>)</a></li>
                    <?php endif; ?>
                </ul>
            </nav>

            <?php if(!empty($data)):?>
                <div class="welcome">
                    <h5 class="u-bold">Latest post: </h5></span>
                    <h1 class="u-bold"><a href=""><?php echo $data[0]['title'];?></a></h1>
                    <p>Published by <a href="">admin</a>.</p>
                </div>
            <?php endif;?>
        </div>
    </header>