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
            $hashedPass = $this->getHash($username);
            if(password_verify($password,$hashedPass)){
                $query = $this->db->prepare('SELECT * fROM users WHERE username=:username AND password=:password');
                $query->execute([':username'=>$username, ':password'=>$hashedPass]);
                $user = $query->fetchAll(PDO::FETCH_OBJ);
                //var_dump($user);
               // die();
                return $user;
            }
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
        //TODO: hash the password
        if (!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password']) && !empty($_POST['email'])) {
            $username = $_POST['username'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
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
    
    /**
     * Checks if a logged in user is admin.
     */
    public function isAdmin() {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] != 'admin') {
                return false;
            }
        }

        return false;
    }

    private  function  getHash($username){
            $query =  $this->db->query("SELECT password FROM users WHERE username='{$username}'");
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            if(empty($result)){
                return false;
            }else {
                return $result[0]->password;
            }
    }

}
