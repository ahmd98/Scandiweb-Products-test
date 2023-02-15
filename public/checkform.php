<?php
require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Database;

class validateSku
{
    public function skuvalidation()
    {
        $db = new Database();
        if (!empty($_POST["sku"])) {
            $result = $db->getProduct($_POST["sku"]);
            if ($result > 0) {
                echo "<span style='color:red'>SKU already exists.</span>";
                echo "<script>$('#save_btn').prop('disabled',true);</script>";
            } else {
                echo "<span style='color:green'>SKU is available.</span>";
                echo "<script>$('#save_btn').prop('disabled',false);</script>";
            }
        }
    }

}
$skuchecker = new validateSku();
$skuchecker->skuvalidation();