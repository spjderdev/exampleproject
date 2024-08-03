<?php 

require_once 'BaseController.php';
require_once './models/Product.php';
class TopicController extends BaseController {
    function __construct() {
        $this -> folder = 'pages';
    }

    public function show() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $products = Product::getProductById($id);
            $data = [
                'products' => $products,
            ];
            $this -> render('topic', $data);
        }
        else {
            Header("Location: index.php?controller=pages&action=error");
        }
    }
}