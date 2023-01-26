<?php
namespace app\models\ProductTypes;

use app\models\Product;

class Furniture extends Product
{
    protected function validateValue()
    {
        if (!($this->data['length']) || !($this->data['width']) || !($this->data['height'])) {
            return "One or more dimesnions were not provided";
        }
        if (
            ($this->data['height'] && $this->data['height'] < 0) ||
            ($this->data['width'] && $this->data['width'] < 0) ||
            ($this->data['length'] && $this->data['length'] < 0)
        ) {
            return "Error, dimensions must be positive number";
        } else {
            $this->value = "Dimensions: " . $this->data['height'] . 'X' . $this->data['width'] . 'X' . $this->data['length'] . "CM";
        }
    }
}