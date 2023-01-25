<?php
namespace app\models\ProductTypes;

use app\models\Product;

class DVD extends Product
{
    protected function validateValue()
    {
        if (!$this->data['size']) {
            return "Error,size was not provided";
        } else if ($this->data['size'] < 0) {
            return "Error, size must be a positive number";
        } else {
            $this->value = $this->data['size'] . ' MB';
        }
    }
}