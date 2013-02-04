<?php

class Admin_Suppliers_Controller extends Base_Controller 
{
	public function action_index()
	{
		$data['report_message'] = Session::get('result');
		$data['query'] = Supplier::paginate(Config::get('admin.row_per_page'));
		return View::make('admin.suppliers', $data);
	}

	// --------------------------------------------------------------------------

	public function action_create()
	{    
		$input = Input::get();
		$result = Supplier::create($input) ? 'Create data succeed' : false;
		return Redirect::to_action('admin.suppliers@index')->with('result', $result);
	}
	
	// --------------------------------------------------------------------------

	public function action_update($id)
	{    
		$input = Input::get();
		$result = Supplier::where('id', '=', $id)->update($input) ? 'Update data succeed' : false;
		return Redirect::to_action('admin.suppliers@index')->with('result', $result);
	}
	
	// --------------------------------------------------------------------------

	public function action_delete($id)
	{    
		$result = Supplier::where('id', '=', $id)->delete() ? 'Delete data succeed' : false;
		return Redirect::to_action('admin.suppliers@index')->with('result', $result);
	}
	
	// --------------------------------------------------------------------------
}