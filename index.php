<?php

require_once __DIR__ . '/classes/Product.class.php';
require_once __DIR__ . '/classes/Dvd.class.php';
require_once __DIR__ . '/classes/Furniture.class.php';
require_once __DIR__ . '/classes/Book.class.php';
require_once __DIR__ . '/classes/ProductFactory.class.php';
require_once __DIR__ . '/classes/Dbo.class.php';

$db = new Dbo();

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['delch'])) {
    $db->deleteData($_POST['delch']);
}

$productsArray = $db->getData();

$viewProps = [ 
    'viewName' => 'productList',
    'pageTitle' => 'Product List'
];

include_once __DIR__ . '/views/layout.view.php';