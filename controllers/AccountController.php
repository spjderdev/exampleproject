<?php 

require_once 'BaseController.php';

class AccountController extends BaseController {
    function __construct() {
        $this -> folder = 'accounts';
    }

    public function signin() {
        $this -> render('signin');
    }

    public function signup() {
        $this -> render('signup');
    }
}