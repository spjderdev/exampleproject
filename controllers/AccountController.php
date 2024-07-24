<?php 

require_once 'BaseController.php';
require_once './models/User.php';
class AccountController extends BaseController {
    function __construct() {
        $this -> folder = 'accounts';
    }

    public function signin() {
        $this -> render('signin');
    }

    public function login() {
        session_start();
        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(empty($username) || empty($password)) {
                echo '<script>alert("All field are required")</script>';
            }
            else {
                $users = new User($username, $password);

                $ok = $users->LoginCheck($username, $password);

                if($ok) {
                    $_SESSION['user_id'] = $ok['id'];
                    $_SESSION['username'] = $ok['username'];
                    echo '<script>alert("Login successfully, now you will be redirect to Home")
                    window.location.href = "index.php?controller=pages&action=home";
                    </script>';
                }
                else {
                    echo '<script>alert("Invalid")</script>';
                }
            }
        }
    }

    public function logout() {
        $this -> render('logout');
    }

    public function signup() {
        $this -> render('signup');
    }

    public function register() {
   
            if(isset($_POST['register'])) {
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
    
                if(empty($email) || empty($username) || empty($password)) {
                    echo "<script>alert('All field are required')</script>";
                }
                else {
                    $user = new User($email, $username, $password);
    
                    try {
                        $user -> RegisterAccount($email, $username, $password);
                        echo '<script>alert("Register succesfully, you will be redirect to Login Panel");
                        window.location.href = "index.php?controller=account&action=signin";
                        </script>';
                    } catch(Exception $e) {
                        echo "Error " . $e->getMessage();
                    }
                }
        }
    }
}