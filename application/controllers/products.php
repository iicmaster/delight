<?php

class Products_Controller extends Base_Controller 
{
	public function action_index()
	{
		$data['products'] = Product::all();
		return View::make('main.products', $data);
	}
}