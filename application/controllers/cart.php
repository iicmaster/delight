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
}