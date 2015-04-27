<?php // TODO: add Config::get('paths', 'incl') to all header and footer requires. ?>
<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main-admin">
        <div class="row">
            <div class="twelve columns">
                <?php if(isset($data)) : ?>
                    <h2 class="profile-name u-large-text u-text-center">
                        Manage categories

                    </h2>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <section class="six columns">
                <h5>Add new category: </h5>
                <?php if($data['msg'] != null) : ?>
                    <div class="msg">
                        <?php echo $data['msg']; ?>
                    </div>
                <?php endif; ?>

                <form action="" method="POST">
                        <input name="categoryTitle" type="text" class="full-input" placeholder="Enter category"/> <br />
                        <input type="submit" name="categorySubmit" value="Submit new category" />
                </form>
            </section>
            
            <section class="six columns">
                <h5>Manage categories: </h5>
                
                <?php if(!empty($data['categories'])) : ?>
                    <?php foreach($data['categories'] as $category) : ?>
                        <div class="list-item row">
                            <div class="eight columns">
                                <h5 class="u-bold">
                                    <a href="<?php echo Config::get('paths', 'root'); ?>category/show/<?php echo $category->id; ?>">
                                        <?php echo $category->title; ?>
                                    </a>
                                </h5>
                            </div>
                            <div class="four columns u-text-right item-options">
                                <a href="<?php echo Config::get('paths', 'root'); ?>category/edit/<?php echo $category->id; ?>">Edit</a> |
                                <a href="<?php echo Config::get('paths', 'root'); ?>category/delete/<?php echo $category->id; ?>">Delete</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
        </div>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>