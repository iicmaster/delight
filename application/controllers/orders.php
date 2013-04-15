<?php

class Orders_Controller extends Base_Controller 
{

    public function action_index()
    {
        $data['orders'] = Product_Order::where('user_id', '=', Auth::user()->id)->get();
        return View::make('main.orders.index', $data);
    }
    
    // -------------------------------------------------------------------------

    public function action_show($id)
    {
        $data['order'] = Product_Order::find($id);
        return View::make('main.orders.show', $data);
    }
    
    // -------------------------------------------------------------------------

}