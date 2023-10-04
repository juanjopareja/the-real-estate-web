<?php 

namespace App;

class Property {

    // DB
    protected static $db;
    protected static $columnsDB = ['id', 'title', 'price', 'image', 'description', 'bedrooms', 'wc', 'parking', 'created', 'sellers_id'];
    
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


    public static function setDB($database) {
        self::$db = $database;
    }

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
        // Insert data sanitize
        $attributes = $this->sanitizeData();

        // DB Insert
        $query = "INSERT INTO properties ( ";
        $query .= join(', ', array_keys($attributes));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($attributes));
        $query .= " ')";
        
        $result = self::$db->query($query);
    }

    public function attributes() {
        $attributes = [];
        foreach(self::$columnsDB as $column) {
            if($column === 'id') continue;
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    public function sanitizeData() {
        $attributes = $this->attributes();
        $sanitized = [];
        
        foreach($attributes as $key => $value) {
            $sanitized[$key] = self::$db->escape_string($value);
        }
        
        return $sanitized;
    }
}
