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
        switch ((string) $this->get_attribute('status')) {
            case '0':
                $status = 'Waiting for Baking';
                break;
            case '1':
                $status = 'Baking';
                break;
            case '2':
                $status = 'Waiting for shipping';
                break;
            case '3':
                $status = 'Completed';
                break;
            case '4':
                $status = 'Cancel';
                break;        
        }

        return $status;
    }

    public function get_status_text_for_customer()
    {
        switch ((string) $this->get_attribute('status')) {
            case '3':
                $status = 'Completed';
                break;
            case '4':
                $status = 'Cancel';
                break;

            default:
                $status = 'Waiting for shipping';
                break;
        }

        return $status;
    }
}