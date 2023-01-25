<?php
namespace app\models\ProductTypes;

use app\models\Product;

class Book extends Product
{
    protected function validateValue()
    {
        if (!$this->data['weight']) {
            return "Error, Weight must be Provided";
        }

        if (is_numeric($this->data['weight']) && floatval($this->data['weight'] >= 0)) {
            $this->value = $this->data['weight'] . ' KG';
            return "";
        }

        return "Error, Weight must be a Positive number";
    }
}