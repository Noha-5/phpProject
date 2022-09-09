<?php

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function __construct($ary)
    {
        parent::__construct($ary['type'], $ary['sku'], $ary['name'], $ary['price']);
        $this->height = $ary['height'];
        $this->width = $ary['width'];
        $this->length = $ary['length'];
    }
    
    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getLength()
    {
        return $this->length;
    }
    
    public function display()
    {
        parent::display();
        echo "<li>Dimension: $this->height x $this->width x $this->length</li>";
    }

    public function validate()
    {
        if(empty($this->getSku()) || empty($this->getName()) || empty($this->getPrice()) || empty($this->getHeight()) || empty($this->getWidth()) || empty($this->getLength())) {
            return 'Please submit the required data';
        }

        $sku = trim($this->getSku());
        $sku = htmlspecialchars($sku);
        $this->setSku($sku);

        $name = trim($this->getName());
        $name = htmlspecialchars($name);
        $this->setName($name);

        $price = trim($this->getPrice());
        $price = filter_var($price, FILTER_VALIDATE_FLOAT);
        $this->setPrice($price);

        $height = trim($this->getHeight());
        $height = filter_var($height, FILTER_VALIDATE_INT);
        $this->setHeight($height);

        $width = trim($this->getWidth());
        $width = filter_var($width, FILTER_VALIDATE_INT);
        $this->setWidth($width);

        $length = trim($this->getLength());
        $length = filter_var($length, FILTER_VALIDATE_INT);
        $this->setLength($length);

        if($price === false || $height === false || $width === false || $length === false) {
            return 'Please provide the data of indicated type';
        }

        return true;
    }
    
    public function getKeys()
    {
        return 'type, sku, name, price, height, width, length';
    }

    public function getValues()
    {
        return [
            $this->getType(),
            $this->getSku(),
            $this->getName(),
            $this->getPrice(),
            $this->getHeight(),
            $this->getWidth(),
            $this->getLength()
        ];
    }
}