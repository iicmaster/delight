<?php

class Cart_Controller extends Base_Controller 
{
    public function action_index()
    {
        $data['cart'] = Session::get('cart', array());
        $data['locations'] = Location::all();
        return View::make('main.cart', $data);
    }
    
    // -------------------------------------------------------------------------

    public function action_add($id)
    {
        $cart = Session::get('cart', array());

        if (isset($cart[$id]->quantity)) {
            $cart[$id]->quantity++;
        } else {
            $product = Product::find($id);
            $cart[$id] = (object) array(
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'size' => $product->size,
                'unit' => $product->unit,
                'price' => $product->price,
                'quantity' => 1,
            );
        }

        Session::put('cart', $cart);
        return Redirect::to('/cart');
    }
    
    // -------------------------------------------------------------------------

    public function action_remove($id)
    {
        $cart = Session::get('cart', array());
        unset($cart[$id]);
        Session::put('cart', $cart);
        return Redirect::to('/cart');
    }
    
    // -------------------------------------------------------------------------

    public function action_shiping()
    {
        return View::make('main.shiping', $data);
    }
    
    // -------------------------------------------------------------------------

    public function action_checkout()
    {
        $report['status'] = 'success';
        $report['message'] = 'Create order successful.';    
        Session::forget('cart');

        return Redirect::to('products')->with('report', $report);
    }
    
    // -------------------------------------------------------------------------
}