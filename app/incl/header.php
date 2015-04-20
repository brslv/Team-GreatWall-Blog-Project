<!DOCTYPE html>
<html>
    <meta charset="utf-8" />
    <title>This is the blog.</title>
    
    <!-- HARDCODE THE STYLE URL: -->
    <link rel="stylesheet" href="http://localhost/Teamwork Blog/Team-GreatWall-Blog-Project/public/css/style.css" type="text/css"  />
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
                    <?php include Config::get('paths', 'incl') . 'navigation.php'; ?>
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