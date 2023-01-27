<?php
namespace app\core;

use app\models\Product;
use PDO;

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

class Database
{
    private $host = 'localhost';
    private $dbname = 'scandiweb_products';
    private $user = 'root';
    private $password = '';
    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getProducts()
    {
        $statement = $this->pdo->prepare('SELECT * FROM products ORDER BY sku ASC');

        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProduct($sku)
    {
        $SKU_statement = $this->pdo->prepare('SELECT * FROM products WHERE sku LIKE :sku');
        $SKU_statement->bindValue(':sku', $sku);
        $SKU_statement->execute();
        return $SKU_statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProducts(Product $product)
    {
        $statement = $this->pdo->prepare("INSERT INTO products (sku,name,price,type,value) Values(:sku,:name,:price,:type,:value)");
        $statement->bindValue(':sku', $product->sku);
        $statement->bindValue(':name', $product->name);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':type', $product->type);
        $statement->bindValue(':value', $product->value);
        $statement->execute();
    }
    public function deleteProduct($deleteSku)
    {
        $statement = $this->pdo->prepare("DELETE FROM products WHERE sku=:deleteSku");
        $statement->bindValue(":deleteSku", $deleteSku);
        $statement->execute();
    }
}