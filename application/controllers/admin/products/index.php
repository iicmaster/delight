<?php

class Admin_Products_Index_Controller extends Base_Controller 
{
	public function action_index()
	{
		$data['report_message'] = Session::get('result');
		$data['query'] = Product::where('owner_id', '=', Auth::user()->id)
							  	->order_by('id', 'desc')
								->paginate(Config::get('admin.row_per_page'));
		return View::make('admin.products.index', $data);
	}

	// --------------------------------------------------------------------------
}