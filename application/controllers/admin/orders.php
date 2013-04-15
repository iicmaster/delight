<?php

class Admin_Orders_Controller extends Base_Controller 
{
    public function action_index()
    {
        $data['report_message'] = Session::get('result');
        $data['query'] = Product_Order::order_by('id', 'desc')
                                      ->paginate(Config::get('admin.row_per_page'));
        return View::make('admin.orders.index', $data);
    }
    
    // -------------------------------------------------------------------------

    public function action_show($id)
    {
        $data['order'] = Product_Order::find($id);
        $data['locations'] = Location::all();
        return View::make('admin.orders.show', $data);
    }

    // --------------------------------------------------------------------------

    public function action_store()
    {    
        $input = Input::get();

        try {
            $query = Location::create($input);
            $result['status'] = true;
            $result['message'] = __('admin.message_create_succeed');
        } catch(\Exception $e) {
            Log::write('error', $e);
            $result['status'] = false;
            $result['message'] = __('admin.message_create_failed');
        }

        // Redirect to index page
        return Redirect::to_action('admin.locations@index')->with('result', $result);
    }

    // --------------------------------------------------------------------------

    public function action_update($id)
    {    
        $input = Input::get();

        try {
            Location::update($id, $input);
            $result['status'] = true;
            $result['message'] = __('admin.message_update_succeed');
        } catch(\Exception $e) {
            Log::write('error', $e);
            $result['status'] = false;
            $result['message'] = __('admin.message_update_failed');
        }

        // Redirect to index page
        return Redirect::to_action('admin.locations@index')->with('result', $result);
    }

    // --------------------------------------------------------------------------

    public function action_delete($id)
    {    
        try {
            Location::find($id)->delete();
            $result['status'] = true;
            $result['message'] = __('admin.message_delete_succeed');
        }  catch(\Exception $e) {
            Log::write('error', $e);
            $result['status'] = false;
            $result['message'] = __('admin.message_delete_failed');
        }

        // Redirect to index page
        return Redirect::to_action('admin.locations@index')->with('result', $result);
    }

    // --------------------------------------------------------------------------

}