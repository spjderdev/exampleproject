<?php 

require_once 'BaseController.php';

require_once './models/Product.php';
class PagesController extends BaseController {
    
    function __construct() {
        $this -> folder = 'pages';
    }

    public function home() {
        $products = Product::getAllProduct();
        $data = [
            'products' => $products
        ];
        $this -> render('home', $data);
    }

    public function signin() {
        $this -> render('signin');
    }

    public function error() {
        $this -> render('error');
    }
}