<?php // TODO: add Config::get('paths', 'incl') to all header and footer requires. ?>
<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main">
        <div class="row">
            <div class="twelve columns">
                <?php if(isset($data)) : ?>
                    <h2 class="profile-name u-large-text u-text-center">
                        Manage posts
                    </h2>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <section class="six columns">
                <h5>Add new post: </h5>
                <?php if($data['msg'] != null) : ?>
                    <div class="msg">
                        <?php echo $data['msg']; ?>
                    </div>
                <?php endif; ?>

                <form action="" method="POST">
                    <input type="text" name="postTitle" class="full-input" placeholder="Enter title" /> <br />
                    
                    <textarea name="postContent" class="full-textarea" placeholder="Enter post content"></textarea> <br />
                    
                    <label for="postTags">Insert tags: </label>
                    <input class="full-input" type="text" name="postTags" placeholder="Separate those bitches by comma: " />

                    <select name="postCategory">
                        <?php if(isset($data['categories'])):?>
                            <?php foreach($data['categories'] as $d):?>

                                <option value="<?php echo $d->id;?>"><?php echo $d->title?></option>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>

                    <select name="postVisibility">
                        <option value="1">Public</option>
                        <option value="0">Private</option>
                    </select>
                   
                    <input type="submit" name="postSubmit" value="Submit post" />
                </form>
            </section>
            
            <section class="six columns">
                <h5>Manage posts: </h5>
                
                <?php if(!empty($data['posts'])) : ?>
                    <?php foreach($data['posts'] as $post) : ?>
                        <div class="list-item row">
                            <div class="eight columns">
                                <h5 class="u-bold">
                                    <a href="<?php echo Config::get('paths', 'root'); ?>post/show/<?php echo $post['id']; ?>">
                                        <?php echo $post['title']; ?>
                                    </a>
                                </h5>
                            </div>
                            <div class="four columns u-text-right item-options">
                                <a href="<?php echo Config::get('paths', 'root'); ?>admin/edit/post/<?php echo $post['id']; ?>">Edit</a> |
                                <a href="<?php echo Config::get('paths', 'root'); ?>post/delete/<?php echo $post['id']; ?>">Delete</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
        </div>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>