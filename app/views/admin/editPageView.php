<?php // TODO: add Config::get('paths', 'incl') to all header and footer requires. ?>
<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main-admin">
        <div class="row">
            <div class="twelve columns">
                <h2 class="profile-name u-large-text u-text-center">
                    Edit page
                </h2>
            </div>
        </div>

        <div class="row">
            <section class="twelve columns">
                <h5>Edit page: </h5>

                <?php if($data['msg'] != null) : ?>
                    <div class="msg">
                        <?php echo $data['msg']; ?>
                    </div>
                <?php endif; ?>

                <form action="" method="POST">
                    <input type="text" name="newTitle" class="full-input" value="<?php echo $data['oldVersion'][0]->title; ?>" /> <br />
                    <textarea name="newContent" class="full-textarea" placeholder="Enter page content">
                        <?php echo $data['oldVersion'][0]->content; ?>
                    </textarea> <br />
                    <select name="newStatus">
                        <option value="0">Private</option>
                        <option value="1">Public</option>
                    </select>
                    <input type="submit" name="updatePageSubmit" value="Submit page" />
                </form>
            </section>
        </div>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>