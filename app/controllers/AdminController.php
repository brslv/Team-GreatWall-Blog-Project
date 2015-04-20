<?php

class Admin extends Main {
    
    public function index() {
        $this->getView('adminView');
    }
    
    /**
     * Adds a post to the database
     * 
     */
    public function addPost() {
        $text = null;

        if (isset($_POST['postSubmit'])) {
            $model = $this->getModel('PostModel');

            $result = $model->addPost();

            if ($result) {
                $text = ['Post added successfully :)'];
            } else {
                $text = ['Post not added successfully :('];
            }
        }

        $this->getView('addpostView', $text);
    }
    
}
