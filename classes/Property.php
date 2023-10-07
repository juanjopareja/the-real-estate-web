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

}
