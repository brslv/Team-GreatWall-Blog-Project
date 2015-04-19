<?php
class User extends Main {

    public function index()
    {
        $this->getView('homeView');
//            $this->getView('adminView');
    }

    public function login() {
        if (isset($_POST['loginSubmit'])) {
            $model = $this->getModel('UserModel');
            $user = $model->login()[0];
            if (!empty($user)){
                $_SESSION['username'] = $user->username;
            }
        }
        $this->getView('loginView');
    }

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
