<?php

namespace Http\Classes;

require_once 'Product.php';

use Core\App;
use Core\Database;

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function __construct($sku, $name, $price, $height, $width, $length)
    {
        parent::__construct($sku, $name, $price);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public function getType()
    {
        return 'Furniture';
    }

    public function getAttributes()
    {
        return [
            'Dimensions' => $this->height . 'x' . $this->width . 'x' . $this->length,
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
