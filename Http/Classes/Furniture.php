<?php

namespace Http\Classes;

require_once 'Product.php';

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
}
