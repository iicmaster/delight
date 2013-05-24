<?php

class Admin_Orders_Controller extends Base_Controller 
{
    public function action_index()
    {
        $data['report_message'] = Session::get('report');
        $data['query'] = Product_Order::order_by('id', 'desc')
                                      ->paginate(Config::get('admin.row_per_page'));
        return View::make('admin.orders.index', $data);
    }
    
    // -------------------------------------------------------------------------

    public function action_show($id)
    {
        $data['order'] = Product_Order::find($id);
        $data['locations'] = Location::all();
        $data['is_out_of_stock'] = false;

        foreach ($data['order']->items as $item) {
            $materials = $item->product->materials;
            $pivots = $item->product->materials()->pivot()->get();
            // FB::log($materials);
            foreach ($materials as $key => $material) {
                $data['materials'][$material->id]['quantity'] = isset($data['materials'][$material->id]['quantity'])
                                                                ? $data['materials'][$material->id]['quantity'] + ($pivots[$key]->quantity * $item->quantity)
                                                                : $pivots[$key]->quantity * $item->quantity;
                $data['materials'][$material->id]['name'] = $material->name;
                $data['materials'][$material->id]['unit'] = $material->unit;
                $data['materials'][$material->id]['remain'] = $material->total;
                $data['is_out_of_stock'] = $material->total < $item->quantity ? true : $data['is_out_of_stock'];
            }
        }

        // FB::log($data['materials']);
        return View::make('admin.orders.show', $data);
    }

    // -------------------------------------------------------------------------

    public function action_update($id)
    {    
        $input = Input::get();

        try {
            Product_Order::update($id, $input);
            $report['status'] = 'success';
            $report['message'] = __('admin.message_update_succeed');
        } catch(\Exception $e) {
            Log::write('error', $e);
            $report['status'] = 'error';
            $report['message'] = __('admin.message_update_failed');
        }

        // Redirect to index page
        return Redirect::to_action('admin.orders@index')->with('report', $report);
    }

    // --------------------------------------------------------------------------

}