<?php // TODO: add Config::get('paths', 'incl') to all header and footer requires. ?>
<?php require_once '../app/incl/header-tiny.php'; ?> 

    <main class="main">
        <div class="row">
            <div class="twelve columns">
                <?php if(isset($data)) : ?>
                    <h2 class="profile-name u-large-text u-text-center">
                        Manage pages
                    </h2>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <section class="six columns">
                <h5>Add new page: </h5>
                <?php if($data['msg'] != null) : ?>
					<div class="msg">
						<?php echo $data['msg']; ?>
					</div>
				<?php endif; ?>

				<form action="" method="POST">
			        <input type="text" name="pageTitle" class="full-input" placeholder="Enter title" /> <br />
			        <textarea name="pageContent" class="full-textarea" placeholder="Enter page content"></textarea> <br />
			        <select name="pageStatus">
			        	<option value="0">Private</option>
			        	<option value="1">Public</option>
			        </select>
			        <input type="submit" name="pageSubmit" value="Submit page" />
			    </form>
            </section>
            
            <section class="six columns">
                <h5>Manage pages: </h5>
                
                <?php if(!empty($data['pages'])) : ?>
					<?php foreach($data['pages'] as $page) : ?>
						<div class="list-item row">
							<div class="eight columns">
								<h5 class="u-bold">
									<a href="<?php echo Config::get('paths', 'root'); ?>page/show/<?php echo $page->id; ?>">
										<?php echo $page->title; ?>
									</a>
								</h5>
							</div>
							<div class="four columns u-text-right item-options">
								<a href="">Edit</a> | 
								<a href="<?php echo Config::get('paths', 'root'); ?>page/delete/<?php echo $page->id; ?>">Delete</a>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
            </section>
        </div>
    </main>
    
<?php require_once '../app/incl/footer.php'; ?>