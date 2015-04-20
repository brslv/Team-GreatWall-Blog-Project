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

        if (!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password']) && !empty($_POST['email'])) {
            $username = $_POST['username'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            
            $query = $this->db->prepare('INSERT INTO users(username, firstname, lastname, password, email) VALUES(:username, :firstname, :lastname, :password, :email)');

            return $query->execute([
                ':username'=>$username,
                ':firstname'=>$firstname,
                ':lastname'=>$lastname,
                ':password'=>$password,
                ':email'=>$email
            ]);

        }

    }
}
