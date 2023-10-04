<?php 

namespace App;

class Property {

    // DB
    protected static $db;
    
    public $id;
    public $title;
    public $price;
    public $image;
    public $description;
    public $bedrooms;
    public $wc;
    public $parking;
    public $created;
    public $sellers_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->title = $args['title'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? 'image.jpg';
        $this->description = $args['description'] ?? '';
        $this->bedrooms = $args['bedrooms'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['parking'] ?? '';
        $this->created = date('Y/m/d');
        $this->sellers_id = $args['sellers_id'] ?? '';
    }

    public function save() {
        // DB Insert
        $query = "INSERT INTO properties (title, price, image, description, bedrooms, wc, parking, created, sellers_id)
        VALUES ('$this->title', '$this->price', '$this->image', '$this->description', '$this->bedrooms', '$this->wc', '$this->parking', '$this->created', '$this->sellers_id')";

        $result = self::$db->query($query);

        debug($result);
    }

    public static function setDB($database) {
        self::$db = $database;
    }
}

?>