<?php

class UserModel extends MainModel
{

    /**
     * Performs user login.
     * 
     * @return boolean
     */
    public function login()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $query = $this->db->prepare('SELECT * fROM users WHERE username=:username AND password=:password');
            $query->execute([':username'=>$username, ':password'=>$password]);
            $user = $query->fetchAll(PDO::FETCH_OBJ);
            //var_dump($user);
           // die();
            return $user;
        }
        
    }

    /**
     * Performs user register.
     * 
     * @return boolean
     */
    public function register()
    {
        //TODO: Each user can add comments

        if (!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password']) && !empty($_POST['email'])) {
            $username = $_POST['username'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $role = 'user';
            $query = $this->db->prepare('INSERT INTO users(username, firstname, lastname, password, email, role) VALUES(:username, :firstname, :lastname, :password, :email, :role)');

            return $query->execute([
                ':username'=>$username,
                ':firstname'=>$firstname,
                ':lastname'=>$lastname,
                ':password'=>$password,
                ':email'=>$email,
                ':role' => $role
            ]);

        }

    }
    public function isAdmin() {
        if (isset($_SESSION['username'])) {
            if (!$_SESSION['role'] == 'admin') {
                Redirect::to('homepage');
            }
        }
    }
}
