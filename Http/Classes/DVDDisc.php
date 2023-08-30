<?php

namespace Http\Classes;

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
}
