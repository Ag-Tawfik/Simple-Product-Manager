<?php

namespace Http\Classes;

use Core\App;
use Core\Database;

class DVDDisc extends Product
{
    private $size;

    public function __construct($sku, $name, $price, $size)
    {
        parent::__construct($sku, $name, $price);
        $this->size = $size;
    }

    public function getType()
    {
        return 'DVD';
    }

    public function getAttributes()
    {
        return [
            'Size' => $this->size . 'MB'
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
