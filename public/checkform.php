<?php
$dbname = 'scandiweb_products';
$host = 'localhost';
$user = 'root';
$password = '';
$pdo = null;
$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!empty($_POST["sku"])) {
    $SKU_statement = $pdo->prepare('SELECT * FROM products WHERE sku LIKE :sku');
    $SKU_statement->bindValue(':sku', $_POST["sku"]);
    $SKU_statement->execute();
    $result = $SKU_statement->fetchColumn(PDO::FETCH_ASSOC);
    if ($result > 0) {
        echo "<span style='color:red'>SKU already exists.</span>";
        echo "<script>$('#save_btn').prop('disabled',true);</script>";
    } else {
        echo "<span style='color:green'>SKU is available.</span>";
        echo "<script>$('#save_btn').prop('disabled',false);</script>";
    }
}