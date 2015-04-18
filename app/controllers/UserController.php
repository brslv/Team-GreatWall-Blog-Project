<?php
class User extends Main
{

    public function index()
    {
        echo "Wrong move :)";
        //$this->getView('homeView');
    }
    public function registerUser(){
        $text = null;
        if(isset($_POST['registerSubmit'])){
            $model = $this->getModel('UserModel');
            $result = $model->register();
            if($result){
                $text = ['Registered successfully :)'];

            }
            else{
                $text = ['Registered unsuccessfully :('];
            }

        }

        $this->getView('registerView',$text);
    }



}