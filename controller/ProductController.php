<?php

namespace app\controller;

use app\core\Database;
use app\core\Router;

use app\models\ProductTypes\Invalid;

class ProductController
{
    public function index(Router $router)
    {
        $products = $router->db->getProducts();
        $router->renderView('products/product_list', ['products' => $products]);
    }
    public function add(Router $router)
    {
        $product = new Invalid([]);
        $errors = [];
        $productData = [];
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $productData['sku'] = $_POST['sku'];
            $productData['name'] = $_POST['name'];
            $productData['price'] = $_POST['price'];
            $productData['selectType'] = $_POST['selectType'];
            $productData['size'] = $_POST['size'];
            $productData['height'] = $_POST['height'];
            $productData['width'] = $_POST['width'];
            $productData['length'] = $_POST['length'];
            $productData['weight'] = $_POST['weight'];
            $productType = "app\\models\\productTypes\\" . $productData['selectType'];

            if (class_exists($productType)) {
                $product = new $productType($productData);
            } else {
                $product = new Invalid($productData);
            }
            $errors = $product->validateData();

            if (empty($errors)) {
                $db = new Database();
                $db->addProducts($product);
                header('Location:/product_list');
                exit;
            }
        }
        $router->renderView('products/add_product', ['product' => $product, 'errors' => $errors]);
    }


    public function delete(Router $router)
    {
        if (isset($_POST['product_delete_btn']) && isset($_POST['product_delete_sku'])) {
            $db = new Database();
            foreach ($_POST["product_delete_sku"] as $deleteSku) {
                $db->deleteProduct($deleteSku);
            }
        }
        header("Location: product_list");
    }
}