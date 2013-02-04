<?php

class Admin_Materials_Stock_Controller extends Base_Controller 
{
	public function action_restock()
	{
		$data['query'] = Material::where('owner_id', '=', Auth::user()->id)
								 ->where('total', '<', DB::raw('`max_stock`'))
								 ->get();
		$data['suppliers'] = Supplier::all();
		return View::make('admin.materials.stock.restock', $data);
	}

	// --------------------------------------------------------------------------
}