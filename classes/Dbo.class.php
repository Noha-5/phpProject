<?php

class Dbo
{
    private $server;
    private $port;
    private $dbName;
    private $userName;
    private $password;
    private $dsn;

    public function __construct()
    {
        $this->server = 'localhost';
        $this->port = '3306';
        $this->dbName = 'test';
        $this->userName = 'root';
        $this->password = '';
        $this->dsn = "mysql:host=$this->server;dbname=$this->dbName;port=$this->port";
    }

    public function getConnection()
    {
        try{
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            $connection = new PDO($this->dsn, $this->userName, $this->password, $options);
        } catch(PDOException $e) {
            echo 'Connection Failed';
            return null;
        }

        return $connection;
    }
    
    // Fetch mode FETCH_FUNC uses ProductFactory to make correct object.
    public function getData() 
    {
        $productArray = [];

        $con = $this->getConnection();
        if($con === null) {
            return $productArray;
        }

        $stmt = $con->prepare('SELECT type, sku, name, price, size, weight, height, width, length FROM product ORDER BY sku;');
        $stmt->execute();
        $productArray = $stmt->fetchAll(PDO::FETCH_FUNC, 'ProductFactory::makeProduct');

        $con = null;
        
        return $productArray;
    }
    
    public function deleteData($deleteProductArray)
    {
        $con = $this->getConnection();
        if($con === null) {
            return;
        }

        $skuList = str_repeat('?, ', count($deleteProductArray)-1) . '?';

        $stmt = $con->prepare("DELETE FROM product WHERE sku IN($skuList);");
        $stmt->execute($deleteProductArray);

        $con = null;
    }

    public function saveData($product)
    {
        $con = $this->getConnection();
        if($con === null) {
            return 'Connection Failed';
        }

        $msg = '';
        if(($msg = $product->validate()) === true) {
            $columns = $product->getKeys();
            $values = $product->getValues();
            $valueList = str_repeat('?, ', count($values)-1) . '?';
            
            $sql = "INSERT INTO product ($columns) VALUES ($valueList);";
            $stmt = $con->prepare($sql);
            
            try {
                $stmt->execute($values);
                $con = null;
                return true;
            } catch(PDOException $e) {
                $con = null;
                // If Error is for inserting duplicate primary key
                if($e->getCode() === '23000') {
                    $msg = 'Duplicate SKU.<br>Given SKU already exists';
                }
            }
        }
        return $msg;
    }

}