<!DOCTYPE html>
<html>
    <meta charset="utf-8" />
    <title>This is the blog.</title>
    
    <!-- HARDCODE THE STYLE URL: -->
    <link rel="stylesheet" href="http://localhost/sites/SUProject/1/public/css/style.css" type="text/css" />
    <script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <?php // TODO: fix font-size of tiny-mce ?>
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
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contacts</a></li>
                    <li><a href="http://localhost/GreatWall/trunk/public/user/login">Login</a></li>
                    <li><a href="http://localhost/GreatWall/trunk/public/user/register">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>