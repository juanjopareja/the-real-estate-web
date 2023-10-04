<?php 

namespace App;

class Property {
    
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
        $this->image = $args['image'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->bedrooms = $args['bedrooms'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['parking'] ?? '';
        $this->created = date('d/m/Y');
        $this->sellers_id = $args['sellers_id'] ?? '';
    }
}

?>