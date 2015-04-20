<?php

class Post extends Main {

    /**
     * Post::index()
     * 
     */
    public function index() {
        Redirect::to('homepage');
    }
    
    public function show($id = null) {
        if($id == null) {
            Redirect::to('homepage');
        }
        else {
            $model = $this->getModel('PostModel');
            $post = $model->getPostById($id[0]);
            $this->getView('singleView', $post);
        }
    }

}
