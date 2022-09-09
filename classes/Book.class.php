<?php

class Book extends Product
{
    private $weight;

    public function __construct($ary)
    {
        parent::__construct($ary['type'], $ary['sku'], $ary['name'], $ary['price']);
        $this->weight = $ary['weight'];
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function display()
    {
        parent::display();
        echo "<li>Weight: $this->weight KG</li>";
    }

    public function validate()
    {
        if(empty($this->getSku()) || empty($this->getName()) || empty($this->getPrice()) || empty($this->getWeight())) {
            return 'Please submit required data';
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

        $weight = trim($this->getWeight());
        $weight = filter_var($weight, FILTER_VALIDATE_INT);
        $this->setWeight($weight);
        
        if($weight === false || $price === false) {
            return 'Please provide the data of indicated type';
        }

        return true;
    }

    public function getKeys()
    {
        return 'type, sku, name, price, weight';
    }

    public function getValues()
    {
        return [
            $this->getType(),
            $this->getSku(),
            $this->getName(),
            $this->getPrice(),
            $this->getWeight()
        ];
    }
}