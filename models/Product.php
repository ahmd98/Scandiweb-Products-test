<?php
namespace app\models;

use app\core\Database;

abstract class Product
{
    public string $sku;
    public string $name;
    public float $price;
    public string $type;
    public string $value;
    public array $data;
    public function __construct($inputValues)
    {
        $this->data = $inputValues;
    }
    public function validateData()
    {
        $errors = [];
        if ($this->validateSku()) {
            $errors[] = $this->validateSku();
        }
        if ($this->validateName()) {
            $errors[] = $this->validateName();
        }
        if ($this->validatePrice()) {
            $errors[] = $this->validatePrice();
        }
        if ($this->validateType()) {
            $errors[] = $this->validateType();
        }
        if ($this->validateValue()) {
            $errors[] = $this->validateValue();
        }
        return $errors;
    }

    private function validateSku()
    {
        if (!$this->data['sku']) {
            return "Error, SKU was not provided!";
        }

        $db = new Database();
        if (!empty($db->getProduct($this->data['sku']))) {
            return "Error,SKU already taken!";
        }
        $this->sku = $this->data['sku'];
        return "";
    }

    private function validateName()
    {
        if (!$this->data['name']) {
            return "Error,Name was not provided";
        }
        $this->name = $this->data['name'];
        return "";
    }

    private function validatePrice()
    {
        if (!$this->data['price']) {
            return "Error, Price was not provided!";
        }
        if (!(strlen($this->data['price']) > 0) || !(floatval($this->data['price']) >= 0)) {
            return "Error, Price must be Positive number";
        }

        $this->price = floatVal($this->data['price']);
        return "";
    }

    private function validateType()
    {
        if (!$this->data['selectType']) {
            return "Error, Type was not provided!";
        }
        $this->type = $this->data['selectType'];
        return "";
    }

    abstract protected function validateValue();
}
?>