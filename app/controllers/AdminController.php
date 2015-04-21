<?php

class Admin extends Main {
    
    public function index() {
        $model = $this->getModel('UserModel');
        $model->isAdmin();

        $text = null;

        if (isset($_POST['postSubmit'])) {
            $model = $this->getModel('PostModel');

            $result = $model->addPost();

            if ($result) {
                $text = ['Post added successfully :)'];
            } else {
                $text = ['Don\'t cheat, bro! Fill in all the blanks.'];
            }
        }
        $this->getView('adminView', $text);
    }

    // index method-а ще си извика един от двата метода:
        // addPost()
        // manage($param) ==> $param = posts || categories || pages
    // ВЮ-то ще си вика други вю-та от папка views/admin в зависимост от това какви данни са подадени
    
}

