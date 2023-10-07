<?php

namespace App;

class Seller extends ActiveRecord {

    protected static $table = 'sellers';

    protected static $columnsDB = ['id', 'name', 'lastname', 'phone'];

    public $id;
    public $name;
    public $lastname;
    public $phone;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->phone = $args['phone'] ?? '';
    }
}