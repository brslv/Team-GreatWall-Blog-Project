<?php

class Home extends Main{

	public function index() {
        $home = $this->getModel('PostModel');
        $allVisiblePosts = $home->getPosts();
        $this->getView('homeView',$allVisiblePosts);
//            $this->getView('adminView');
        }
}
