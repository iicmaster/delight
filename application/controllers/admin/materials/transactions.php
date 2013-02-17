<?php

class Admin_Materials_Transactions_Controller extends Base_Controller 
{
	public function action_create()
	{
		$items = Input::get('items');

		// Approve order
		$order = Material_Order::find(Input::get('material_order_id'));
		$order->is_approved = 1;
		$order->save();

		// Update order items
		foreach ($items as $id => $item) {
			$_item = Material_Order_Item::find($id);
			$_item->approved_quantity = $item['approved_quantity'];
			$_item->price_per_unit = $item['price_per_unit'];
			$_item->amount = $item['amount'];
			$_item->save();
		}

		// Create transactions 
		foreach ($items as $id => $item) {
			$transaction = new Material_Transaction([
				'owner_id' => Auth::user()->id,
				'material_order_id' => Input::get('material_order_id'),
				'material_order_item_id' => $id,
				'supplier_id' => $item['supplier_id'],
				'material_id' => $item['material_id'],
				'stock_code' => date('Y-m-d'),
				'quantity' => $item['approved_quantity'],
				'price_per_unit' => $item['price_per_unit'],
				'amount' => $item['amount'],
			]);
			$transaction->save();

			// Update total remain material 
			$material = Material::update($item['material_id'], [
				'total' => DB::raw('total + '.$item['approved_quantity']),
				'latest_transaction' => DB::raw('NOW()')
			]);
		}

		$result['status'] = true;
		$result['message'] = __('admin.message_update_succeed');

		return Redirect::to_action('admin.materials.orders@index')->with('result', $result);
	}
}