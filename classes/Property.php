<?php 

namespace App;

class Property extends ActiveRecord{

    protected static $table = 'properties';

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

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->title = $args['title'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->bedrooms = $args['bedrooms'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['parking'] ?? '';
        $this->created = date('Y/m/d');
        $this->sellers_id = $args['sellers_id'] ?? '';
    }

    public function validate() {

        if(!$this->title) {
            self::$errors[] = "Debes añadir un título";
        }

        if(!$this->price) {
            self::$errors[] = "Debes añadir un precio";
        }

        if(strlen($this->description) < 50){
            self::$errors[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$this->bedrooms) {
            self::$errors[] = "El número de habitaciones es obligatorio";
        }

        if(!$this->wc) {
            self::$errors[] = "El número de baños es obligatorio";
        }

        if(!$this->parking) {
            self::$errors[] = "El número de plazas de garage es obligatorio";
        }

        if(!$this->sellers_id) {
            self::$errors[] = "Elige un vendedor";
        }

        if(!$this->image) {
            self::$errors[] = "La imagen es obligatoria";
        }

        return self::$errors;
    }

}
