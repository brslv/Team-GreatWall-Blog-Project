<?php

class Admin extends Main {
    
    //TODO: Make the admin page modular
    public function index() {
        $model = $this->getModel('UserModel');

        // If the logged user is not admin -> redirect him to the homepage.
        // Otherwise - continue.
        if($model->isAdmin()) {
            Redirect::to('admin/addPost');    
        } else {
            Redirect::to('homepage');
        }
        
    }

    /**
     * Loads the addpostView
     */
    public function addPost() {
        if(!$this->getModel('UserModel')->isAdmin()) Redirect::to('homepage');
        $text = null;
        $viewData = null;

        if (isset($_POST['postSubmit'])) {
            $model = $this->getModel('PostModel');

            $result = $model->addPost();

            if ($result) {
                $text = 'Post added successfully :)';
            } else {
                $text = 'Don\'t cheat, bro! Fill in all the blanks.';
            }
        }

        $data = [
            'msg' => $text,
            'action' => 'addPost',
        ];

        $this->getView('adminView', $data);
    }

    /**
     * For manageing categories 
     */
    public function manageCategories() {
        if(!$this->getModel('UserModel')->isAdmin()) Redirect::to('homepage');

        $data = [
            'msg' => null,
            'action' => 'manageCategories'
        ];

        $this->getView('adminView', $data);
    }

    /**
     * For manageing pages
     */
    public function managePages() {
        if(!$this->getModel('UserModel')->isAdmin()) Redirect::to('homepage');
        
        $data = [
            'msg' => null,
            'action' => 'managePages'
        ];

        $this->getView('adminView', $data);
    }

    /**
     * For manageing posts
     */
    public function managePosts() {
        if(!$this->getModel('UserModel')->isAdmin()) Redirect::to('homepage');

        $data = [
            'msg' => null,
            'action' => 'managePosts'
        ];

        $this->getView('adminView', $data);
    }

    // index method-а ще си извика един от двата метода:
        // addPost()
        // manage($param) ==> $param = posts || categories || pages
    // ВЮ-то ще си вика други вю-та от папка views/admin в зависимост от това какви данни са подадени
    
}

