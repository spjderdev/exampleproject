<?php 

require_once 'BaseController.php';
require_once './models/Product.php';
class DashboardController extends BaseController {
    function __construct() {
        $this -> folder = 'admin';
    }    

    function home() {
        $this -> render('dashboard');
    }

    function add() {
        $this -> render('add',[],'Post');

        if(isset($_POST['add'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $images = $_FILES['images']['name'];
            move_uploaded_file($_FILES['images']['tmp_name'], './public/images/' . $images);

            if(empty($title) || empty($description) || empty($price) || empty($category_id)) {
                echo 'Fill something!';
            }
            else {
                $product = new Product($title, $description, $price, $category_id, $images);

                try {
                    $product -> AddProduct($title, $description, $price, $category_id, $images);
                    echo "Success";
                } catch(Exception $e) {
                    echo "Error " . $e -> getMessage();
                }
            }
        }
    }
}