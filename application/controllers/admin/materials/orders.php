<?php

class Admin_Materials_Orders_Controller extends Base_Controller 
{
	public function action_index()
	{
		$data['report_message'] = Session::get('result');
		$data['query'] = Material_Order::order_by('id', 'desc')
							 		   ->paginate(Config::get('admin.row_per_page'));
		return View::make('admin.materials.orders', $data);
	}

	// --------------------------------------------------------------------------

	public function action_create()
	{
		if (count(Input::get('selected_id')) > 0) {
			$data['query'] = Material::where('owner_id', '=', Auth::user()->id)
							 		 ->where_in('id', Input::get('selected_id'))
									 ->get();
		} else {
			$data['query'] = Material::where('owner_id', '=', Auth::user()->id)->get();
		}

		$data['suppliers'] = Supplier::all();

		return View::make('admin.materials.orders.create', $data);
	}

	// --------------------------------------------------------------------------

	public function action_store()
	{
		# code...
	}

	// --------------------------------------------------------------------------
}