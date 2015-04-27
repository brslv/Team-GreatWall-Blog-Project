<?php // TODO: add Config::get('paths', 'incl') to all header and footer requires. ?>
<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main container">
        <div class="row">
            <div class="twelve columns">
                <?php if(isset($data)) : ?>
                    <h2 class="profile-name u-large-text u-text-center">
                        Admin panel
                    </h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <section class="twelve columns u-text-center">
                <a href="<?php echo Config::get('paths', 'root'); ?>post/manage/"><h3>Manage posts</h3></a>
                <a href="<?php echo Config::get('paths', 'root'); ?>page/manage"><h3>Manage pages</h3></a>
                <a href="<?php echo Config::get('paths', 'root'); ?>category/manage"><h3>Manage categories</h3></a>
            </section>
        </div>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>