<?php

class Admin_Users_Controller extends Base_Controller 
{
	public function action_index()
	{
		$data['report_message'] = Session::get('result');
		$data['query'] = User::paginate(Config::get('admin.row_per_page'));
		return View::make('admin.users', $data);
	}

	// --------------------------------------------------------------------------

	public function action_create()
	{    
		$input = Input::get();
		$input['password'] = Hash::make($input['password']);
		$result = User::create($input) ? 'Create data success' : false;
		return Redirect::to_action('admin.users@index')->with('result', $result);
	}
	
	// --------------------------------------------------------------------------

	public function action_update($id)
	{    
		$input = Input::get();
		$input['password'] = Hash::make($input['password']);
		$result = User::where('id', '=', $id)->update($input) ? 'Update data success' : false;
		return Redirect::to_action('admin.users@index')->with('result', $result);
	}
	
	// --------------------------------------------------------------------------

	public function action_delete($id)
	{    
		$result = User::where('id', '=', $id)->delete() ? 'Delete data success' : false;
		return Redirect::to_action('admin.users@index')->with('result', $result);
	}
	
	// --------------------------------------------------------------------------
}