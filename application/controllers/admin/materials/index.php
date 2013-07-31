<?php

class Admin_Materials_Index_Controller extends Base_Controller 
{
	public function action_index()
	{
		$data['report_message'] = Session::get('report');
		$data['query'] = Material::order_by('id', 'desc')
								 ->paginate(Config::get('admin.row_per_page'));
		$data['suppliers'] = Supplier::all();
		return View::make('admin.materials.index', $data);
	}

	// --------------------------------------------------------------------------

	public function action_create()
	{    
		$input = Input::except('suppliers');
		FB::log($input);

		try {
            DB::transaction((function() use ($input) {
				$material = Material::create($input);

				$material->suppliers()->sync(Input::get('suppliers'));

				$users = User::where_role('admin')->get();
				foreach ($users as $user) {
					$material->users()->attach($user);
				}
			}));

            $report['status'] = 'success';
			$report['message'] = __('admin.message_create_succeed');
		} catch(\Exception $e) {
            dd($e->getMessage());
            Log::write('error', $e->getMessage());
            $report['status'] = 'error';
            $report['message'] = __('admin.message_update_failed');
        }

		return Redirect::to_action('admin.materials@index')->with('report', $report);
	}
	
	// --------------------------------------------------------------------------

	public function action_update($id)
	{    
		$input = Input::get();
		unset($input['suppliers']);

		try {
			$material = Material::find($id);
			$material->update($id, $input);
			// dd($material);
			$material->suppliers()->sync(Input::get('suppliers'));

            $report['status'] = 'success';
			$report['message'] = __('admin.message_create_succeed');
		} catch(\Exception $e) {
            dd($e->getMessage());
            Log::write('error', $e->getMessage());
            $report['status'] = 'error';
            $report['message'] = __('admin.message_update_failed');
        }

		return Redirect::to_action('admin.materials@index')->with('report', $report);
	}
	
	// --------------------------------------------------------------------------

	public function action_delete($id)
	{    
		try {
			Material::where('id', '=', $id)->delete();
            $report['status'] = 'success';
			$report['message'] = __('admin.message_delete_succeed');
		} catch(\Exception $e) {
            // dd($e->getMessage());
            Log::write('error', $e->getMessage());
            $report['status'] = 'error';
            $report['message'] = __('admin.message_delete_failed');
        }
        
		return Redirect::to_action('admin.materials@index')->with('report', $report);
	}

	// --------------------------------------------------------------------------

	public function action_stock()
	{
		return Redirect::to_action('admin.materials.stock@index');
	}
	
	// --------------------------------------------------------------------------
}