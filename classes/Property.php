<?php 

namespace App;

class Property {

    // DB
    protected static $db;
    protected static $columnsDB = ['id', 'title', 'price', 'image', 'description', 'bedrooms', 'wc', 'parking', 'created', 'sellers_id'];
    
    // Errors
    protected static $errors = [];

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

    // Validation
    public static function getErrors() {
        return self::$errors;
    }

    public function validate() {

        if(!$this -> title) {
            self::$errors[] = "Debes añadir un título";
        }

        if(!$this -> price) {
            self::$errors[] = "Debes añadir un precio";
        }

        if(strlen($this -> description) < 50){
            self::$errors[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$this -> bedrooms) {
            self::$errors[] = "El número de habitaciones es obligatorio";
        }

        if(!$this -> wc) {
            self::$errors[] = "El número de baños es obligatorio";
        }

        if(!$this -> parking) {
            self::$errors[] = "El número de plazas de garage es obligatorio";
        }

        if(!$this -> sellers_id) {
            self::$errors[] = "Elige un vendedor";
        }

        // if(!$this -> image['name'] || $this -> image['error']) {
        //     self::$errors[] = "La imagen es obligatoria";
        // }

        // // Validate image size (1Mb max)
        // $size = 1000 * 1000;

        // if($this -> image['size'] > $size) {
        //     self::$errors[] = "La imagen supera el tamaño máximo de archivo (100kb)";
        // }

        return self::$errors;
    }
}
