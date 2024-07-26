<?php 


class Product {
    public $title;
    public $description;
    public $price;
    public $images;
    public $category_id;
    public $category_name;

    function __construct($category_id, $title, $description, $price, $images, $category_name = null) {
        $this -> title = $title;
        $this -> description = $description;
        $this -> price = $price;
        $this -> images = $images;
        $this -> category_id = $category_id;
        $this -> category_name = $category_name;
    }

    static function getAllProduct() {
        $list = [];
        $db = Database::getInstance();
        $req = $db -> query('SELECT p.id, p.title, p.description, p.price, p.images, p.category_id, c.name as category_name
                  FROM products p
                  JOIN categories c ON p.category_id = c.id');

        foreach($req->fetchAll() as $item) {
            $list[] = new Product($item['category_id'], $item['title'], $item['description'], $item['price'], $item['images'], $item['category_name']);
        }
        return $list;
    }

    function AddProduct($title, $description, $price, $category_id, $images) {
        $db = Database::getInstance();
        $query = "INSERT INTO products (title, description, price, category_id, images) VALUES (:title, :description, :price, :category_id, :images)";
        $req = $db -> prepare($query);
        $req -> bindParam(':title', $title);
        $req -> bindParam(':description', $description);
        $req -> bindParam(':price', $price);
        $req -> bindParam(':category_id', $category_id);
        $req -> bindParam(':images', $images);

        if($req -> execute()) {
            return true;
        }
        else {
            throw new Exception("Error add products ") . $req -> getMessage();
        }
    }
}