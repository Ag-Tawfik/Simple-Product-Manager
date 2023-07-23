<?php

$router->get('/', 'index.php');
$router->get('/addproduct', 'create.php');
$router->post('/products', 'store.php');
$router->post('/delete', 'destroy.php');