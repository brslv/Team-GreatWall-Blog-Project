<?php

class User extends Main {

    public function index() {
        // TODO: Show user profile if session exists.
        Redirect::to('homepage');
    }

    /**
     * Loggs in a user
     * 
     */
    public function login() {
        if (isset($_POST['loginSubmit'])) {
            $model = $this->getModel('UserModel');
            $user = $model->login()[0];
            if (!empty($user)) {
                $_SESSION['username'] = $user->username;
            }
        }
        $this->getView('loginView');
    }

    /**
     * Registers a new user
     * 
     */
    public function register() {
        $message = null;
        if (isset($_POST['registerSubmit'])) {
            $model = $this->getModel('UserModel');
            $user = $model->register();
            if ($user) {
                $message = ['Successull registry'];
            } else {
                $message = ['Register fail'];
            }
        }
        $this->getView('registerView', $message);
    }

}
