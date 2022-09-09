<?php

class Dvd extends Product
{
    private $size;

    public function __construct($ary)
    {
        parent::__construct($ary['type'], $ary['sku'], $ary['name'], $ary['price']);
        $this->size = $ary['size'];
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function display()
    {
        parent::display();
        echo "<li>Size: $this->size MB</li>";
    }

    public function validate()
    {
        if(empty($this->getSku() || empty($this->getName() || empty($this->getPrice() || empty($this->getSize()))))) {
            return 'Please submit required data';
        }

        $sku = trim($this->getSku());
        $sku = filter_var($sku, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->setSku($sku);
        
        $name = trim($this->getName());
        $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->setName($name);

        $price = trim($this->getPrice());
        $price = filter_var($price, FILTER_VALIDATE_FLOAT);
        $this->setPrice($price);

        $size = trim($this->getSize());
        $size = filter_var($size, FILTER_VALIDATE_INT);
        $this->setSize($size);

        if($price === false || $size === false) {
            return 'Please provide the data of indicated type';
        }
        
        return true;
    }

    public function getKeys()
    {
        return 'type, sku, name, price, size';
    }

    public function getValues()
    {
        return [
            $this->getType(),
            $this->getSku(),
            $this->getName(),
            $this->getPrice(),
            $this->getSize()
        ];
    }
}