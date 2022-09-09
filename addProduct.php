<?php

require_once __DIR__ . '/classes/Product.class.php';
require_once __DIR__ . '/classes/Dvd.class.php';
require_once __DIR__ . '/classes/Book.class.php';
require_once __DIR__ . '/classes/Furniture.class.php';
require_once __DIR__ . '/classes/ProductFactory.class.php';
require_once __DIR__ . '/classes/Dbo.class.php';

$errMsg = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productType'])) {
    
    $type = $_POST['productType'];
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $length = $_POST['length'];

    $product = ProductFactory::makeProduct(
        $type,
        $sku,
        $name,
        $price,
        $size,
        $weight,
        $height,
        $width,
        $length
    );

    $dbo = new Dbo();

    if(($errMsg = $dbo->saveData($product)) === true) {
        header('Location: /');
    }
}

$viewProps = [
    'pageTitle' => 'Add Product',
    'viewName' => 'addProduct',
    'errMsg' => $errMsg
];

include_once __DIR__ . '/views/layout.view.php';