<?php 

require_once './controllers/BaseController.php';
require_once './models/Product.php';
class DashboardController extends BaseController {
    private $adminHelper;
    function __construct() {
        $this -> folder = 'admin';
    }    

    function home() {
        $this -> render('dashboard');
    }
}