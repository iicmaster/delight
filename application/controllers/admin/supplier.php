<?php

class Admin_Supplier_Controller extends Base_Controller 
{
	public function action_index()
	{
		$input = Input::get();

		if (count($input) > 0) {
			$data['result_action'] = 'Create';
			$data['result'] = Supplier::create($input);
		} else {
			$data['result'] = false;
		}

		$data['suppliers'] = Supplier::all();
		$data['some_text'] = 'abcd';
		return View::make('admin.supplier', $data);
	}

	public function action_update($id)
	{    
		$input = Input::get();
		$data['result'] = Supplier::where('id', '=', $id)->update($input);

		$data['result_action'] = 'Update';
		$data['suppliers'] = Supplier::all();

		return View::make('admin.supplier', $data);
	}

	public function action_delete($id)
	{    
		$input = Input::get();
		$data['result'] = Supplier::where('id', '=', $id)->delete();

		$data['result_action'] = 'Delete';
		$data['suppliers'] = Supplier::all();

		return View::make('admin.supplier', $data);
	}
}