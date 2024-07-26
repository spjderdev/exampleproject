<?php 

require_once 'Product.php';

class Category {
    public $id;
    public $name;

    function __construct($id, $name) {
        $this -> id = $id;
        $this -> name = $name;
    }

    static function getAllCategory() {
        $list = [];
        $db = Database::getInstance();
        $req = $db -> query("SELECT * FROM categories");

        foreach($req->fetchAll() as $item) {
            $list[] = new Category($item['id'], $item['name']);
        }
        return $list;
    }

    static function countProduct() {
        $db = Database::getInstance();
        try {
            $query = "SELECT c.id, c.name, COUNT(p.id) AS product_count FROM categories c
            LEFT JOIN products p ON c.id = p.category_id
            GROUP BY c.id, c.name;";
            $req = $db -> query($query);
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo 'Something went wrong: ' . $e->getMessage();
        }
    }

    static function getCategoryById($id) {
        $db = Database::getInstance();
        try {
            $query = "SELECT * FROM categories WHERE id = :id";
            $req = $db -> prepare($query);
            $req -> bindParam(':id', $id, PDO::PARAM_INT);
            $req -> execute();

            return $req->fetchAll(PDO::FETCH_ASSOC);   
        } catch(PDOException $e) {
            echo 'Something went wrong: ' . $e->getMessage();
        }
    }

    static function editCategory($id, $name) {
        $db = Database::getInstance();
        try {
            $query = "UPDATE categories SET name = :name WHERE id = :id";
            $req = $db -> prepare($query);
            $req -> bindParam(':id', $id);
            $req -> bindParam(':name', $name);
            return $req -> execute();
        } catch(PDOException $e) {
            echo 'Something went wrong: ' . $e -> getMessage();
        }
    }

    static function addCategory($name) {
        $db = Database::getInstance();
        try {
            $query = "INSERT INTO categories(name) VALUES (:name)";
            $req = $db -> prepare($query);
            $req -> bindParam(':name', $name);
            return $req -> execute();
        } catch (PDOException $e) {
            echo 'Something went wrong' . $e -> getMessage();
        }
    }

    static function deleteCategory($id) {
        $db = Database::getInstance();
        try {
            $query = "DELETE FROM categories WHERE id = :id";
            $req = $db -> prepare($query);
            $req -> bindParam(':id', $id);
            return $req -> execute();
        } catch (PDOException $e) {
            echo 'Something went wrong' . $e -> getMessage();
        }
    }
}