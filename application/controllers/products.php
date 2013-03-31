<?php

class Products_Controller extends Base_Controller 
{
	public function action_index()
	{
		$data['products'] = Product::all();
        $data['report'] = Session::get('report');
		return View::make('main.products', $data);
	}
}