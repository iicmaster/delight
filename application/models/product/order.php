<?php

class Product_order extends Eloquent 
{
    public function items()
    { 
        return $this->has_many('Product_order_item');
    }

    public function location()
    {
        return $this->belongs_to('Location');
    }

    public function get_status_text()
    {
        switch ((int) $this->get_attribute('status')) {
            case '1':
                $status = 'Waiting for manufacturing';
                break;

            return $status;
        }

        return 'Waiting for shiping';
    }
}