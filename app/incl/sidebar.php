        <aside class="four columns sidebar">
            <div class="sidebar-item">
                <h5>Latest posts</h5>
                <ul>
                    <?php foreach($data as $post) : ?>
                        <li>
                            <a href="<?php echo Config::get('paths', 'root') ?>post/show/<?php echo $d['id']; ?>">
                                <?php echo $post['title']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="sidebar-item">
                <h5>Categories</h5>
                
                <ul>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                </ul>
            </div>
            
            <div class="sidebar-item">
                <h5>Most popular tags</h5>
                
                <ul>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                    <li><a href="">Some links</a></li>
                </ul>
            </div>
        </aside>