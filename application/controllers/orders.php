<?php

class Orders_Controller extends Base_Controller 
{

    public function action_index()
    {
        $data['orders'] = Product_Order::where('user_id', '=', Auth::user()->id)->get();
        return View::make('main.orders.index', $data);
    }
    
    // -------------------------------------------------------------------------

    public function action_view($id)
    {
        $data['order'] = Product_Order::find($id);
        $data['locations'] = Location::all();
        FB::log($data);
        return View::make('main.orders.view', $data);
    }
    
    // -------------------------------------------------------------------------

}