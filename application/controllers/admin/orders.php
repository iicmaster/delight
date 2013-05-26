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
        } catch(\Exception $e) {
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
                            'quantity' => ($quantity * -1)
                        ]);
                        $transaction->save();

                        // Update material total
                        Material::update($material['id'], ['total' => DB::raw('total - '.$quantity)]);

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
        } catch(\Exception $e) {
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