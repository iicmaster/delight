<?php

class Cart_Controller extends Base_Controller 
{
    public function action_index()
    {
        $data['cart'] = Session::get('cart', array());
        return View::make('main.cart', $data);
    }

    public function action_add($id)
    {
        $cart = Session::get('cart', array());
        $cart[time()] = Product::find($id);
        Session::put('cart', $cart);

        return Redirect::to('/cart');
    }
}