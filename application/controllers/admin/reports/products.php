<?php

class Admin_Reports_Products_Controller extends Base_Controller 
{
    public $restful = true;

    /**
     * Product Sales Report
     * 
     * @return Response 
     */
    public function get_sales()
    {
        return View::make('admin.reports.products.salesIndex');
    }

    /**
     * Product Sales Report
     * 
     * @return Response 
     */
    public function post_sales()
    {
        $start_date = Input::get('start-date', date('Y-m-d')).' 00:00:00';
        $end_date = Input::get('end-date', date('Y-m-d')).' 23:59:59';

        $data['products'] = Product_order_item::with('product')
                                              ->select(array('*', DB::raw('sum(quantity) as total')))
                                              ->join(
                                                'product_orders', 
                                                'product_order_items.product_order_id', '=', 'product_orders.id'
                                              )
                                              ->where(
                                                'location_id', 
                                                'IN', 
                                                DB::raw('(SELECT id FROM locations WHERE user_id = '.Auth::user()->id.')')
                                              )
                                              ->where('status', '=', '3')
                                              ->where_between('product_orders.updated_at', $start_date, $end_date)
                                              ->group_by('product_id')
                                              ->get();

        return View::make('admin.reports.products.salesShow', $data);
    }
}