<?php

class Admin_Products_Index_Controller extends Base_Controller 
{
	public function action_index()
	{
		$data['report_message'] = Session::get('result');
		$data['query'] = Product::where('owner_id', '=', Auth::user()->id)
							  	->order_by('id', 'desc')
								->paginate(Config::get('admin.row_per_page'));
		$data['materials'] = Material::all();
		return View::make('admin.products.index', $data);
	}

	// --------------------------------------------------------------------------

	public function action_create()
	{    
		$input = Input::get();
		$input['owner_id'] = Auth::user()->id;
		unset($input['materials']);

		try {
			DB::transaction((function() use ($input) {
				// Insert new product data 
				$product = Product::create($input);

				// Insert product's materials data
				if (Input::get('materials')) {
					foreach (Input::get('materials') as $id => $data) {
						$product->materials()->attach($id, $data);
					}
				}

				// Check has upload image
				if (Input::file('image.name')) {
					$upload_path = 'uploads/products';
					$file_name = $product->id.'.'.File::extension(Input::file('image.name'));
					$file_path = $upload_path.'/'.$file_name;

					// Move uploaded image
					Input::upload('image', $upload_path, $file_name);

					// Save image path
					$product->image = $file_path;
					$product->save();
				}
			}));

			$result['status'] = true;
			$result['message'] = __('admin.message_create_succeed');
		}
		catch(\Exception $e)
		{
			Log::write('error', $e);
			$result['status'] = false;
			$result['message'] = __('admin.message_create_failed');
		}

		// Redirect to product index
		return Redirect::to_action('admin.products@index')->with('result', $result);
	}

	// --------------------------------------------------------------------------

	public function action_delete($id)
	{    
		$product = Product::find($id);

		// Delete product image
		if ($product->image) {
			File::delete($product->image);
		}

		if ($product->delete()) {
			$result['status'] = true;
			$result['message'] = __('admin.message_delete_succeed');
		} else {
			$result['status'] = false;
			$result['message'] = __('admin.message_delete_failed');
		}

		return Redirect::to_action('admin.products@index')->with('result', $result);
	}

	// --------------------------------------------------------------------------
}