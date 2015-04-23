        <aside class="four columns sidebar">
            <div class="sidebar-item">
                <h5>Latest posts</h5>
                <ul class="non-bullet">
                    <?php // TODO: List only the latest 3-5 posts, not all!!! ?>
                    <?php foreach($data as $post) : ?>
                        <li>
                            <a href="<?php echo Config::get('paths', 'root') ?>post/show/<?php echo $post['id']; ?>">
                                <?php echo $post['title']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="sidebar-item">
                <h5>Categories</h5>
                
                <ul class="non-bullet">
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                </ul>
            </div>
            
            <div class="sidebar-item">
                <h5>Most popular tags</h5>
                
                <ul class="non-bullet">
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                </ul>
            </div>
        </aside>