<?php

namespace Http\Classes;

require_once 'Product.php';

use Core\App;
use Core\Database;

class Book extends Product
{
    private $weight;

    public function __construct($sku, $name, $price, $weight)
    {
        parent::__construct($sku, $name, $price);
        $this->weight = $weight;
    }

    public function getType()
    {
        return 'Book';
    }

    public function getAttributes()
    {
        return [
            'Weight' => $this->weight . 'Kg'
        ];
    }

    public function save()
    {
        $attributes = $this->getAttributes();

        $jsonAttributes = json_encode($attributes);

        $db = App::resolve(Database::class);

        $db->query('INSERT INTO products(sku, name, price, type, attributes) VALUES(:sku, :name, :price, :type, :attributes)', [
            'sku' => $this->getSku(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'type' => $this->getType(),
            'attributes' => $jsonAttributes
        ]);
    }
}
