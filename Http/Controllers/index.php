<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$products = $db->query('select * from products')->get();

$products = array_map(function ($product) {
    $product['attributes'] = json_decode($product['attributes'], true);
    return $product;
}, $products);

view("product_list.html", [
    'products' => $products,
    'heading' => 'Product List'
]);
