<?php
require_once __DIR__ . '/../models/connection.php';


$products = [
    [
        'name' => 'Nike',
        'link' => '/soleXchange/src/controllers/brand_products.php?brand=Nike',
    ],
    [
        'name' => 'Adidas',
        'link' => '/soleXchange/src/controllers/brand_products.php?brand=Adidas',
    ],
    [
        'name' => 'Puma',
        'link' => '/soleXchange/src/controllers/brand_products.php?brand=Puma',
    ],
    [
        'name' => 'New Balance',
        'link' => '/soleXchange/src/controllers/brand_products.php?brand=New Balance',
    ],
    [
        'name' => 'Jordan',
        'link' => '/soleXchange/src/controllers/brand_products.php?brand=Jordan',
    ],
    [
        'name' => 'Reebok',
        'link' => '/soleXchange/src/controllers/brand_products.php?brand=Reebok',
    ],
];

require 'src/views/brands.view.php' ;


?>