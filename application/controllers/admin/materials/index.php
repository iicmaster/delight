<?php

class Admin_Materials_Index_Controller extends Base_Controller 
{
	public function action_index()
	{
		$data['report_message'] = Session::get('result');
		$data['query'] = Material::where('owner_id', '=', Auth::user()->id)
							  	 ->order_by('id', 'desc')
								 ->paginate(Config::get('admin.row_per_page'));
		$data['suppliers'] = Supplier::all();
		return View::make('admin.materials.index', $data);
	}

	// --------------------------------------------------------------------------

	public function action_create()
	{    
		$input = Input::get();
		$query = Location::create($input);

		if ($query) {
			$material->suppliers()->sync(Input::get('suppliers'));
			$result = __('admin.message_create_succeed');
		} else {
			$result = false;
		}

		return Redirect::to_action('admin.materials@index')->with('result', $result);
	}
	
	// --------------------------------------------------------------------------

	public function action_update($id)
	{    
		$input = Input::get();
		unset($input['suppliers']);

		$material = Material::find($id)->update($id, $input);

		if ($material) {
			Material::find($id)->suppliers()->sync(Input::get('suppliers'));
			$result = __('admin.message_update_succeed');
		} else {
			$result = false;
		}

		return Redirect::to_action('admin.materials@index')->with('result', $result);
	}
	
	// --------------------------------------------------------------------------

	public function action_delete($id)
	{    
		$result = Material::where('id', '=', $id)->delete() ? __('admin.message_delete_succeed') : false;
		return Redirect::to_action('admin.materials@index')->with('result', $result);
	}

	// --------------------------------------------------------------------------

	public function action_stock()
	{
		return Redirect::to_action('admin.materials.stock@index');
	}
	
	// --------------------------------------------------------------------------
}