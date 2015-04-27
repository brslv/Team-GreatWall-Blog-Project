<?php // TODO: add Config::get('paths', 'incl') to all header and footer requires. ?>
<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main">
        <div class="row">
            <div class="twelve columns">
                <?php if(isset($data)) : ?>
                    <h2 class="profile-name u-large-text u-text-center">
                        <?php
                            if($data['action'] == 'manageCategories') {
                                echo 'Manage categories';
                            } 
                            else if($data['action'] == 'managePages') {
                                echo 'Manage pages';
                            }
                            else if($data['action'] == 'managePosts') {
                                echo 'Manage posts';
                            }
                        ?>
                    </h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <section class="five columns">
                <?php if(isset($data)) : ?>
                    <?php
                        if($data['action'] == 'manageCategories') {
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
            
            <section class="seven columns">
                <h5>More options: </h5>
                
                <ul class="non-bullet">
                    <li><a href="<?php echo Config::get('paths', 'root'); ?>post/manage">Manage posts</a></li>
                    <li><a href="<?php echo Config::get('paths', 'root'); ?>page/manage">Manage pages</a></li>
                    <li><a href="<?php echo Config::get('paths', 'root'); ?>category/manage">Manage categories</a></li>
                </ul>
            </section>
        </div>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>