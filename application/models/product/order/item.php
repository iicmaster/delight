<?php

class Product_order_item extends Eloquent 
{
    public function product()
    {
        return $this->belongs_to('Product');
    }
}