<?php

namespace Http\Classes;

require_once 'Product.php';

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
}
