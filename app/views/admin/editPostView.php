<?php // TODO: add Config::get('paths', 'incl') to all header and footer requires. ?>
<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main-admin">
        <div class="row">
            <div class="twelve columns">
                <h2 class="profile-name u-large-text u-text-center">
                    Edit post
                </h2>
            </div>
        </div>

        <div class="row">
            <section class="twelve columns">
                <?php if($data['msg'] != null) : ?>
                    <div class="msg">
                        <?php echo $data['msg']; ?>
                    </div>
                <?php endif; ?>

                <form action="" method="POST">
                    <input type="text" name="newTitle" class="full-input" value="<?php echo $data['oldVersion'][0]['title']; ?>" /> <br />
                    
                    <textarea name="newContent" class="full-textarea"><?php echo $data['oldVersion'][0]['content']; ?></textarea> <br />

                    <select name="newCategory">
                        <?php if(isset($data['categories'])):?>
                            <?php foreach($data['categories'] as $d):?>

                                <option value="<?php echo $d->id;?>"><?php echo $d->title?></option>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>

                    <select name="newStatus">
                        <option value="1">Public</option>
                        <option value="0">Private</option>
                    </select>
                   
                    <input type="submit" name="updatePostSubmit" value="Update post" />
                </form>            </section>
        </div>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>