<?php

class Products_Controller extends Base_Controller 
{
	public function action_index()
	{
		return View::make('main.products');
	}
}