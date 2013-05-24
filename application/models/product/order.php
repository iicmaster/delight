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

    /**
     * Get all required materials of this order
     * 
     * @param   int     $order_id
     * @return  array
     */
    public static function required_materials($order_id) {
        $order = Product_Order::find($order_id);
        $list = array();

        foreach ($order->items as $item) {
            $materials = $item->product->materials;
            $pivots = $item->product->materials()->pivot()->get();

            foreach ($materials as $key => $material) {
                $required_quantity = $pivots[$key]->quantity * $item->quantity;
                $list[$material->id]['quantity'] = isset($list[$material->id]['quantity'])
                                                                ? $list[$material->id]['quantity'] + $required_quantity
                                                                : $required_quantity;
                $list[$material->id]['name'] = $material->name;
                $list[$material->id]['unit'] = $material->unit;
                $list[$material->id]['remain'] = $material->total;
                $list[$material->id]['is_out_of_stock'] = ($material->total < $item->quantity);
            }
        }

        return $list;
    }

}