<?php

class ProductFactory
{
    public static function makeProduct(
        $type,
        $sku,
        $name,
        $price,
        $size,
        $weight,
        $height,
        $width,
        $lenght
    ) {

        $productType = ucfirst($type);
        
        if(class_exists($productType)) {

            $ary = [
                'type' => $type,
                'sku' => $sku,
                'name' => $name,
                'price' => $price,
                'size' => $size,
                'weight' => $weight,
                'height' => $height,
                'width' => $width,
                'length' => $lenght
            ];

            return new $productType($ary);
        } else {
            throw new Exception('Product Type Not Found');
        }
    }
}