<?php

class Admin_Materials_Controller extends Base_Controller 
{
	public function action_index()
	{
		$data['result'] = Session::get('result');
		$data['materials'] = Material::paginate(Config::get('admin.row_per_page'));
		return View::make('admin.materials', $data);
	}

	// --------------------------------------------------------------------------

	public function action_create()
	{    
		$input = Input::get();
		$result = Material::create($input) ? 'Create data success' : false;
		return Redirect::to_action('admin.materials@index')->with('result', $result);
	}
	
	// --------------------------------------------------------------------------

	public function action_update($id)
	{    
		$input = Input::get();
		$result = Material::where('id', '=', $id)->update($input) ? 'Update data success' : false;
		return Redirect::to_action('admin.materials@index')->with('result', $result);
	}
	
	// --------------------------------------------------------------------------

	public function action_delete($id)
	{    
		$result = Material::where('id', '=', $id)->delete() ? 'Delete data success' : false;
		return Redirect::to_action('admin.materials@index')->with('result', $result);
	}
	
	// --------------------------------------------------------------------------
}