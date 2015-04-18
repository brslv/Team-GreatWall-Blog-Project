<?php
class Post extends Main
{

    public function index()
    {
        echo "Wrong move ;)";
        //$this->getView('homeView');
    }
    public function addPost(){
        $text = null;
        if(isset($_POST['postSubmit'])){
            $model = $this->getModel('PostModel');
            $result = $model->addPost();
            if($result){
                $text = ['Post added successfully :)'];

            }
            else{
                $text = ['Post not added successfully :('];
            }

        }

        $this->getView('addpostView',$text);
    }



}