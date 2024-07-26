<?php 

require_once './controllers/BaseController.php';
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

    function add() {
        $this -> render('add',[],'Category');
        if(isset($_POST['add'])) {
            $name = $_POST['name'];

            $categories = Category::addCategory($name);

            if($categories) {
                echo '<script>alert("Create success");
                window.location.href = "index.php?controller=category&action=list";
                </script>';
            }
            else {
                echo 'Failed';
            }
        }
    }

    function delete($id) {
        $categories = Category::deleteCategory($id);
        if($categories) {
            echo '<script>alert("Delete success");
            window.location.href = "index.php?controller=category&action=list";
            </script>
            ';
        } 
        else {
            echo 'Failed';
        }
    }
}