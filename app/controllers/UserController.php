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
        $message = null;
        if (isset($_POST['loginSubmit'])) {
            $model = $this->getModel('UserModel');
            $user = $model->login();
            if (!empty($user)) {
                $user = $user[0];
                $_SESSION['id'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['firstname'] = $user->firstname;
                $_SESSION['lastname'] = $user->lastname;
                $_SESSION['email'] = $user->email;
                $_SESSION['role'] = $user->role;
                Redirect::to('user/me');
            } else {
                $message = ['Login fail'];
            }
        }
        $this->getView('loginView', $message);
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

    /**
     * Displays the current user's profile
     */
    public function me() {
        if(!isset($_SESSION['username'])) {
            Redirect::to('homepage');
        }
        
        $this->getView('profileView');
    }
    
    public function logout() {
        session_destroy();
        session_unset('username');
        session_unset('id');
        session_unset('firstname');
        session_unset('lastname');
        session_unset('email');
        session_unset('role');
        Redirect::to('homepage');
    }
    
}
