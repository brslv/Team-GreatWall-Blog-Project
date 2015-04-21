<?php // TODO: add Config::get('paths', 'incl') to all header and footer requires. ?>
<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main container row">
        <section class="eight columns">
            <?php if(isset($data)) : ?>
                <?php 
                    if($data['action'] == 'addPost') {
                        require_once Config::get('paths', 'views') . 'admin/addpostView.php';
                    } 
                    else if($data['action'] == 'manageCategories') {
                        require_once Config::get('paths', 'views') . 'admin/manageCategoriesView.php';
                    } 
                    else if($data['action'] == 'managePages') {
                        require_once Config::get('paths', 'views') . 'admin/managePagesView.php';
                    }
                    else if($data['action'] == 'managePosts') {
                        require_once Config::get('paths', 'views') . 'admin/managePostsView.php';
                    }
                ?>
            <?php endif; ?>
        </section>
        
        <section class="four columns">
            <h5>More options: </h5>
            
            <ul class="non-bullet">
                <li><a href="<?php echo Config::get('paths', 'root'); ?>admin/addPosts">Add posts</a></li>
                <li><a href="<?php echo Config::get('paths', 'root'); ?>admin/managePosts">Manage posts</a></li>
                <li><a href="<?php echo Config::get('paths', 'root'); ?>admin/managePages">Manage pages</a></li>
                <li><a href="<?php echo Config::get('paths', 'root'); ?>admin/manageCategories">Manage categories</a></li>
            </ul>
        </section>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>