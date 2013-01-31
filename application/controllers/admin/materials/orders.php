<?php

class Admin_Materials_Orders_Controller extends Base_Controller 
{
	public function action_index()
	{
		$data['report_message'] = Session::get('result');
		$data['query'] = Material_Order::order_by('id', 'desc')
							 		   ->paginate(Config::get('admin.row_per_page'));
		$data['suppliers'] = Supplier::all();
		return View::make('admin.materials.orders.index', $data);
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
		$items = Input::get('items');

		// Create material order
		$order = new Material_Order([
			'owner_id' => Auth::user()->id,
			'description' => Input::get('description'),
		]);
		$order->save();

		// Insert order items
		if ($order) {
			foreach (Input::get('selected_items') as $id) {
				$item = new Material_Order_item([
					'material_id' => $id,
					'supplier_id' => $items[$id]['supplier_id'],
					'ordered_quantity' => $items[$id]['quantity'],
				]);
				$order->items()->insert($item);
			}
			$result['status'] = true;
			$result['message'] = __('admin.message_create_succeed');
		} else {
			$result['status'] = false;
			$result['message'] = __('admin.message_create_failed');
		}

		return Redirect::to_action('admin.materials.orders@index')->with('result', $result);
	}

	// --------------------------------------------------------------------------
}