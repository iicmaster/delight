<?php

class Admin_Reports_Financial_Controller extends Base_Controller 
{
    public $restful = true;

    /**
     * Income Report Index
     * 
     * @return Response 
     */
	public function get_income()
	{
        return View::make('admin.reports.financial.incomeIndex');
	}

    /**
     * Income Report Show
     * 
     * @return Response 
     */
	public function post_income()
	{
        $start_date = Input::get('start-date', date('Y-m-d')).' 00:00:00';
        $end_date = Input::get('end-date', date('Y-m-d')).' 23:59:59';

        $data['prduct_sales'] = Product_Order::where('status', '=', '3')
		                                     ->where_between('product_orders.updated_at', $start_date, $end_date)
		                                     ->sum('total');

        $data['shipping_fee'] = Product_Order::where('status', '=', '3')
                                             ->where_between('product_orders.updated_at', $start_date, $end_date)
                                             ->sum('shipping_fee');

        $data['shipping_cost'] = Product_Order::where('status', '=', '3')
                                             ->where_between('product_orders.updated_at', $start_date, $end_date)
                                             ->sum('shipping_cost');

        $materials = Material_Transaction::with('material')
                                         ->select(array(DB::raw('ABS(SUM(quantity * price_per_unit)) as cost')))
                                         ->where('user_id', '=', Auth::user()->id)
                                         ->where('quantity', '<', '0')
                                         ->where_between('created_at', $start_date, $end_date)
                                         ->first();

     	$data['materials_cost'] = $materials->cost;

     	$data['total_income'] = $data['prduct_sales'] + $data['shipping_fee'];
     	$data['total_cost'] = $data['materials_cost'] + $data['shipping_cost'];
     	$data['total_profit'] = $data['total_income'] - $data['total_cost'];
     	
        return View::make('admin.reports.financial.incomeShow', $data);
	}

}