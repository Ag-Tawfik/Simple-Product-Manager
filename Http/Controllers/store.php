<?php

use Core\App;
use Core\Database;
use Http\Classes\Book;
use Http\Classes\DVDDisc;
use Http\Classes\Furniture;

$db = App::resolve(Database::class);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $result = $db->query("SELECT * FROM products WHERE sku = :sku", [
        'sku' => $_POST['sku'],
    ])->get();

    if (count($result) > 0) {
        $errors['sku'] = 'SKU must be unique';
    }

    if (!empty($errors)) {
        return view("add_product.html", [
            'errors' => $errors,
            'heading' => 'Add Product'
        ]);
    }

    $productType = $_POST['productType'];
    $product = match ($productType) {
        'Book' => new Book($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['weight']),
        'DVD' => new DVDDisc($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['size']),
        'Furniture' => new Furniture($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['height'], $_POST['width'], $_POST['length']),
        default => null,
    };

    if ($product !== null) {
        $product->save();
    }

    header('location: /');
    die();
}
