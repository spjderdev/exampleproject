<?php 


class Product {
    public $id;
    public $title;
    public $description;
    public $price;
    public $images;
    public $category_id;
    public $category_name;
    public $video;

    function __construct($id,$category_id, $title, $description, $price, $images, $video,$category_name = null) {
        $this -> id = $id;
        $this -> title = $title;
        $this -> description = $description;
        $this -> price = $price;
        $this -> images = $images;
        $this -> category_id = $category_id;
        $this -> category_name = $category_name;
        $this -> video = $video;
    }

    static function getAllProduct() {
        $list = [];
        $db = Database::getInstance();
        $req = $db -> query('SELECT p.id, p.title, p.description, p.price, p.images, p.category_id, p.video, c.name as category_name
                  FROM products p
                  JOIN categories c ON p.category_id = c.id');

        foreach($req->fetchAll() as $item) {
            $list[] = new Product($item['id'],$item['category_id'], $item['title'], $item['description'], $item['price'], $item['images'], $item['video'], $item['category_name']);
        }
        return $list;
    }

    static function getProductById($id) {
        $db = Database::getInstance();
        $query = "SELECT p.id, p.title, p.description, p.price, p.images, p.category_id, p.video, c.name as category_name
                  FROM products p
                  JOIN categories c ON p.category_id = c.id
                  WHERE p.id = :id";
        $req = $db -> prepare($query);
        $req -> bindParam(':id', $id);
        $req -> execute();
        return $req->fetch(PDO::FETCH_ASSOC); 
    }

    static function addProduct($title, $description, $price, $category_id, $images, $video) {
        $db = Database::getInstance();
        $query = "INSERT INTO products (title, description, price, category_id, images, video) VALUES (:title, :description, :price, :category_id, :images, :video)";
        $req = $db -> prepare($query);
        $req -> bindParam(':title', $title);
        $req -> bindParam(':description', $description);
        $req -> bindParam(':price', $price);
        $req -> bindParam(':category_id', $category_id);
        $req -> bindParam(':images', $images);
        $req -> bindParam(':video', $video);

        if($req -> execute()) {
            return true;
        }
        else {
            throw new Exception("Error add products ") . $req -> getMessage();
        }
    }

    static function deleteProduct($id) {
        $db = Database::getInstance();
        $query = "DELETE FROM products where id = :id";
        $req = $db -> prepare($query);
        $req -> bindParam(':id', $id);
        if($req -> execute()) {
            return true;
        }
        else {
            throw new Exception("Error when deleting products ") . $req ->getMessage();
        }
    }

    static function editProduct($id, $title, $description, $price, $category_id, $images = null, $video = null) {
        $db = Database::getInstance();
        $query = "UPDATE products SET title = :title, description = :description, price = :price, category_id = :category_id";

        if($images !== null) {
            $query .= ", images = :images";
        }

        if($video !== null) {
            $query .= ", video = :video";
        }

        $query .= " WHERE id = :id";

        $req = $db->prepare($query);

        $req -> bindParam(':id', $id);
        $req -> bindParam(':title', $title);
        $req -> bindParam(':description', $description);
        $req -> bindParam(':price', $price);
        $req -> bindParam(':category_id', $category_id);
        
        if($images !== null) {
            $req -> bindParam(':images', $images);
        }
        if($video !== null) {
            $req -> bindParam(':video', $video);
        }

        if($req -> execute()) {
            return true;
        }
        else {
            throw new Exception("Error when edit products ") . $req -> getMessage();
        }

    }
}