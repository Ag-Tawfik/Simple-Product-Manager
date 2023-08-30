<?php

namespace Http\Classes;

use Core\App;
use Core\Database;

abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;

    public function __construct($sku, $name, $price)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    abstract public function getType();
    abstract public function getAttributes();

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
