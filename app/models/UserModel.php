<?php

class UserModel extends MainModel
{

    public function get()
    {
//        $user = $this->db->query('SELECT * FROM users');
//        $user = $user->fetchAll(PDO::FETCH_OBJ);
//        return $user;
    }

    public function login()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            // 1. check if user exists
            // 2. get status
            // 3. return value
            $query = $this->db->prepare('SELECT * fROM users WHERE username=:username AND password=:password');
            $query->execute([':username'=>$username, ':password'=>$password]);
            $user = $query->fetchAll(PDO::FETCH_OBJ);
            return $user;
        }

    }
    public function register()
    {
        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            //$email = $_POST['email'];
            // 1.
            // 2.
            // 3.
            $query = $this->db->prepare('INSERT INTO users(username, password, email) VALUES(:username, :password, :email)');
            return  $query->execute([':username'=>$username, ':password'=>$password, ':email'=>$email]);

        }

    }
}
