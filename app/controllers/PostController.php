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
        
        // TODO: implement show post by id functionality.
    }

}
