<?php 


class Product {
    public $id;
    public $title;
    public $description;
    public $price;
    public $images;

    function __construct($id, $title, $description, $price, $images) {
        $this -> id = $id;
        $this -> title = $title;
        $this -> description = $description;
        $this -> price = $price;
        $this -> images = $images;
    }

    static function getAllProduct() {
        $list = [];
        $db = Database::getInstance();
        $req = $db -> query('SELECT * FROM products');

        foreach($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['title'], $item['description'], $item['price'], $item['images']);
        }
        return $list;
    }
}