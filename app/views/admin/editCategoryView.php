<?php // TODO: add Config::get('paths', 'incl') to all header and footer requires. ?>
<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main-admin">
        <div class="row">
            <div class="twelve columns">
                <h2 class="profile-name u-large-text u-text-center">
                    Edit category
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
                    <input name="newTitle" type="text" class="full-input" value="<?php echo $data['oldVersion'][0]->title; ?>" /> <br />
                    <input type="submit" name="updateCategorySubmit" value="Update category" />
                </form>
            </section>
        </div>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>