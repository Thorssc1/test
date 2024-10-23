<?php

namespace App\Controllers;

use App\Models\Product;
use PDO;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\RouteCollection;

class ProductController
{
    // Show the product attributes based on the id.
    public function showAction(int $id, RouteCollection $routes): void
    {
        $product = new Product();
        $product->read($id);

        require_once APP_ROOT . '/templates/product.php';
    }

    // Show the product attributes based on the id.
    public function testAction(RouteCollection $routes): void
    {

        $product = new Product();
        $product->read('1');

        if($_POST) {

            $data = $_POST;

            $image = '';
            if ($_FILES['image']['tmp_name']) {
                $image = file_get_contents($_FILES['image']['tmp_name']);
            }

            $data['image'] = $image ? $_FILES['image']['name'] : '';
            $data['image_base64'] = $image ? base64_encode($image) : '';

            $product->create($data);

        }

        require_once APP_ROOT . '/templates/product.php';
    }

    public function test2Action(RouteCollection $routes): void
    {
        dd('endlich');

        require_once APP_ROOT . '/templates/product.php';
    }
}
