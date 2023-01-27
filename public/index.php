<?php
use app\controller\ProductController;
use app\core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$router = new Router();

$router->get('/', [ProductController::class, 'index']);
$router->get('/product_list', [ProductController::class, 'index']);
$router->get('/add_product', [ProductController::class, 'add']);
$router->post('/add_product', [ProductController::class, 'add']);
$router->post('/delete_product', [ProductController::class, 'delete']);

$router->resolve();