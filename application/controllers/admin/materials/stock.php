<?php

class Admin_Materials_Stock_Controller extends Base_Controller 
{
	public function action_transactions($material_id)
	{
		$data['material'] = Material::find($material_id);
		$data['query'] = Material_Transaction::where('user_id', '=', Auth::user()->id)
		                                     ->where('material_id', '=', $material_id)
		                                     ->where('quantity', '>', 0)
		                                     ->paginate(10);
		$data['history'] = Material_Transaction::get_stock_history($material_id);

		return View::make('admin.materials.stock.transactions', $data);
	}

	// -------------------------------------------------------------------------

	public function action_restock()
	{
		$data['query'] = Material::get_recommended_to_restock();
		$data['suppliers'] = Supplier::all();
		return View::make('admin.materials.stock.restock', $data);
	}

	// -------------------------------------------------------------------------
}