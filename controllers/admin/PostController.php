<?php 

require_once './controllers/BaseController.php';
require_once './models/Product.php';
require_once './models/Category.php';
class PostController extends BaseController {
    function __construct() {
        $this -> folder = 'admin';
    }

    function list() {
        $products = Product::getAllProduct();
        $data = [
            'products' => $products
        ];
        $this -> render('post', $data, 'Post');
    }

    function add() {
        $categories = Category::getAllCategory();
        $data = [
            'categories' => $categories
        ];
        $this -> render('add', $data, 'Post');
        if(isset($_POST['add'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $images = $_FILES['images']['name'];
            move_uploaded_file($_FILES['images']['tmp_name'], './public/images/' . $images);
            $ok = Product::addProduct($title, $description, $price, $category_id, $images);
            if($ok) {
                echo '<script>alert("Create new post success")
                window.location.href = "index.php?controller=post&action=list";
                </script>';
            }
            else {
                echo 'Ko ok';
            }
        }
    }

    function delete($id) {
        $ok = Product::deleteProduct($id);
        if($ok) {
            echo '<script>alert("Delete post success")
            window.location.href = "index.php?controller=post&action=list";
            </script>';
        }
        else {
            echo 'Ko ok';
        }
    }

    function edit($id) {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $products  = Product::getProductById($id);
            $categories = Category::getAllCategory();
            $data = [
                'products' => $products,
                'categories' => $categories
            ];
            $this -> render('edit', $data, 'Post');
        }

        if(isset($_POST['edit'])) {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category_id = $_POST['category_id'];
                $images = !empty($_FILES['images']['name']) ? $_FILES['images']['name'] : null;
                if($images) {
                    move_uploaded_file($_FILES['images']['tmp_name'], './public/images/' . $images);
                }
                $ok = Product::editProduct($id, $title, $description, $price, $category_id, $images);
                if($ok) {
                    echo '<script>alert("Edit post success")
                    window.location.href = "index.php?controller=post&action=list";
                    </script>';
                }
                else {
                    echo '<script>alert("Ko ok");
                    </script>';
                }
            }
        }
    }
}