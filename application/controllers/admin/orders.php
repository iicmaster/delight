<?php

class Admin_Orders_Controller extends Base_Controller 
{
    public function action_index()
    {
        // $start_date = Input::get('start-date', date('Y-m-d')).' 00:00:00';
        // $end_date = Input::get('end-date', date('Y-m-d')).' 23:59:59';
        $data['report_message'] = Session::get('report');

        $productOrders = Product_Order::select('product_orders.*')
                                      ->join(
                                        'locations',
                                        'product_orders.location_id', '=', 'locations.id'
                                      )
                                      ->where('locations.user_id', '=', Auth::user()->id)
                                      ->join(
                                        'users',
                                        'product_orders.user_id', '=', 'users.id'
                                      )
                                      ->order_by('id', 'desc');

        // Status
        if (Input::has('status') and Input::get('status') != 'all') {
            $productOrders = $productOrders->where('status', '=', Input::get('status'));
        }

        // Search
        if (Input::has('criteria') and Input::has('keyword')) {
            $productOrders = $productOrders->where(Input::get('criteria'), 'LIKE', '%'.Input::get('keyword').'%');
        }

        // Date filter
        if (Input::has('start-date') and Input::has('end-date')) {
            $productOrders = $productOrders->where_between('product_orders.created_at', Input::get('start-date'), Input::get('end-date'));
        }

        $data['query'] = $productOrders->paginate(Config::get('admin.row_per_page'));
                                      
        return View::make('admin.orders.index', $data);
    }
    
    // -------------------------------------------------------------------------

    public function action_show($id)
    {
        $data['order'] = Product_Order::find($id);
        $data['materials'] = Product_Order::get_required_materials($id);
        $data['locations'] = Location::all();
        $data['is_out_of_stock'] = false;

        foreach ($data['materials'] as $material) {
            if ($material['is_out_of_stock']) {
                $data['is_out_of_stock'] = true;
                break;
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
        } catch (\Exception $e) {
            Log::write('error', $e);
            $report['status'] = 'error';
            $report['message'] = __('admin.message_update_failed');
        }

        // Redirect to index page
        return Redirect::to_action('admin.orders@index')->with('report', $report);
    }

    // --------------------------------------------------------------------------

    /**
     * Update order status to baking and update material stock
     * 
     * @param   int         $order_id
     * @return  Response
     */

    public function action_baking($order_id) {

        try {
            DB::transaction((function() use ($order_id) {
                $materials = Product_Order::get_required_materials($order_id);

                // Update material stock for this shop
                foreach ($materials as $material) {

                    // Get remain stock
                    $stocks = Material_Transaction::get_remain_stock($material['id']);
                    $total_qualtity = $material['quantity'];

                    while ($total_qualtity > 0) {
                        $stock = current($stocks);
                        $quantity = ($stock->remain > $total_qualtity) ? $total_qualtity : $stock->remain;

                        // Create transactions
                        $transaction = new Material_Transaction([
                            'user_id' => Auth::user()->id,
                            'product_order_id' => $order_id,
                            'material_id' => $material['id'],
                            'stock_code' => $stock->stock_code,
                            'material_order_id' => $stock->material_order_id,
                            'quantity' => ($quantity * -1),
                            'price_per_unit' => $stock->price_per_unit,
                        ]);
                        $transaction->save();

                        // Update material total
                        Material::find($material['id'])
                                ->users()
                                ->pivot()
                                ->where_user_id(Auth::user()->id)
                                ->update(['total' => DB::raw('total - '.$quantity)]);

                        // Update loop variable
                        $total_qualtity -= $quantity;
                        next($stocks);
                    }
                }

                // Update order status
                $product_order = Product_Order::find($order_id);
                $product_order->status = 1;
                $product_order->save();
            }));

            $report['status'] = 'success';
            $report['message'] = __('admin.message_update_succeed');
        } catch (\Exception $e) {
            Log::write('error', $e->getMessage());
            // dd($e->getMessage());
            // exit();
            $report['status'] = 'error';
            $report['message'] = __('admin.message_update_failed');
        }

        // Redirect to product index
        return Redirect::to_action('admin.orders@index')->with('report', $report);
    }

}