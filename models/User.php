<?php 

class User {
    public $id;
    public $username;
    public $email;
    public $password;

    function __construct($username, $password, $email = null) {
        $this -> username = $username;
        $this -> password = $password;
        $this -> email = $email;
    }

    function RegisterAccount($email, $username, $password) {
        $db = Database::getInstance();
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        
        $query = 'INSERT INTO users (email, username, password, role) VALUES (:email, :username, :password, "user")';
        $req = $db->prepare($query);

        $req->bindParam(':email', $email);
        $req->bindParam(':username', $username);
        $req->bindParam(':password', $passwordHash);

        if($req -> execute()) {
            return true;
        } 
        else {
            throw new Exception("Error register an user " . $req->error);
        }
    }

    function LoginCheck($username, $password) {
        $db = Database::getInstance();
        $query = 'SELECT id, username, password, role FROM users where username = :username';
        $req = $db -> prepare($query);
        $req -> bindParam(':username', $username);
        $req -> execute();

        $users = $req->fetch(PDO::FETCH_ASSOC);
        if($users && password_verify($password, $users['password'])) {
            return $users;
        }
        else {
            return false;
        }
    }
}