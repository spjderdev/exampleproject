<?php 

require_once 'BaseController.php';
require_once './models/Category.php';

class CategoryController extends BaseController {
    function __construct() {
        $this -> folder = 'admin';
    }

    function list() {
        $categories = Category::getAllCategory();
        $countProduct = Category::countProduct();
        $data = [
            'categories' => $categories,
            'countProduct' => $countProduct
        ];
        $this -> render('category', $data, 'Category');
    }

    function edit($id) {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $categories = Category::getCategoryById($id);
            if($categories) {
                $data = [
                    'categories' => $categories,
                ];
                $this -> render('edit', $data,'Category');
            }
            else {
                echo 'Error';
            }
        }

        if(isset($_POST['edit'])) {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $name = $_POST['name'];

                if(empty($name)) {
                    echo "Name of category is required";
                }
                else {
                    $editCategory = Category::editCategory($id, $name);
                    if($editCategory) {
                        echo '<script>alert("Update success")</script>';
                    }
                    else {
                        echo 'not success';
                    }
                }
            }
        }
    }
}