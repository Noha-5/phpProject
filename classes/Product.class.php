<?php

abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    public function __construct($type, $sku, $name, $price)
    {
        $this->type = $type;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getType()
    {
        return $this->type;
    }

    public function display()
    {
        echo "<li>$this->sku</li>";
        echo "<li>$this->name</li>";
        echo "<li>$this->price $</li>";
    }

    abstract public function validate();
    abstract public function getKeys();
    abstract public function getValues();
}