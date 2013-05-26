<?php

class Admin_Materials_Stock_Controller extends Base_Controller 
{
	public function action_restock()
	{
		$data['query'] = Material::get_recommended_to_restock();
		$data['suppliers'] = Supplier::all();
		return View::make('admin.materials.stock.restock', $data);
	}

	// --------------------------------------------------------------------------
}