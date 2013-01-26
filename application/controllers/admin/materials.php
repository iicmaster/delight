<?php

class Admin_Materials_Controller extends Base_Controller 
{
	public function action_index()
	{
		$data['report_message'] = Session::get('result');
		$data['query'] = Material::order_by('id', 'desc')->paginate(Config::get('admin.row_per_page'));
		$data['suppliers'] = Supplier::all();
		return View::make('admin.materials', $data);
	}

	// --------------------------------------------------------------------------

	public function action_create()
	{    
		$input = Input::get();
		unset($input['suppliers']);

		$material = Material::create($input);

		if ($material) {
			$material->suppliers()->sync(Input::get('suppliers'));
			$result = __('admin.message_create_success');
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

		// $material = Material::where('id', '=', $id)->update($input);
		$material = Material::find($id)->update($id, $input);

		if ($material) {
			Material::find($id)->suppliers()->sync(Input::get('suppliers'));
			$result = __('admin.message_update_success');
		} else {
			$result = false;
		}

		return Redirect::to_action('admin.materials@index')->with('result', $result);
	}
	
	// --------------------------------------------------------------------------

	public function action_delete($id)
	{    
		$result = Material::where('id', '=', $id)->delete() ? __('admin.message_delete_success') : false;
		return Redirect::to_action('admin.materials@index')->with('result', $result);
	}
	
	// --------------------------------------------------------------------------
}