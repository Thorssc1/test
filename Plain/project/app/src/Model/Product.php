<?php

namespace App\Models;

use PDO;
use PDOException;

class Product
{
    protected $id;
    protected $title;
    protected $description;
    protected $price;
    protected $sku;
    protected $image;

    // GET METHODS
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function getImage()
    {
        return $this->image;
    }

    // SET METHODS
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setPrice(string $price)
    {
        $this->price = $price;
    }

    public function setSku(string $sku)
    {
        $this->sku = $sku;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    // CRUD OPERATIONS
    public function create(array $data)
    {
        $title = $data['title'];
        $description = $data['description'] ?: null;
        $price = $data['price'] ?: 0;
        $sku = $data['sku'] ?: '';
        $image = $data['image'] ?: null;
        $imageBase64 = $data['image_base64'] ?: null;

        try {
            $conn = new PDO('mysql:host=host.docker.internal;dbname=application', 'user', 'password');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            // error loggen
        }

        //$sql = "INSERT INTO products (title, description, telefon, price, sku, image) VALUES (:title, :description, :telefon, :price, :sku, :image)";
        $sql = "INSERT INTO products (title, description, price, sku, image, image_base64) VALUES (:title, :description, :price, :sku, :image, :image_base64)";

        $statement = $conn->prepare($sql);

        $statement->execute([
            ':title' => $title,
            ':description' => $description,
            ':price' => $price,
            ':sku' => $sku,
            ':image' => $image,
            ':image_base64' => $imageBase64
        ]);

    }

    public function read(int $id)
    {
        try {
            $conn = new PDO('mysql:host=host.docker.internal;dbname=application', 'user', 'password');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            // error loggen
        }

        $product = $conn->query("SELECT * FROM products where id = 1")->fetch();


        if ($product){
            $this->title = $product['title'];
            $this->description = $product['description'];
            $this->price = $product['price'];
            $this->sku = $product['sku'];
            $this->image = $product['image'];
        }


        return $this;

    }

    public function update(int $id, array $data)
    {

    }

    public function delete(int $id)
    {

    }
}
