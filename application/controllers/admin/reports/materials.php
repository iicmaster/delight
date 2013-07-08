<?php

class Admin_Reports_Materials_Controller extends Base_Controller 
{
    public $restful = true;

    /**
     * Used Material Report
     * 
     * @return Response 
     */
    public function get_used()
    {
        return View::make('admin.reports.materials.usedIndex');
    }

    /**
     * Used Material Report
     * 
     * @return Response 
     */
    public function post_used()
    {
        $start_date = Input::get('start-date', date('Y-m-d')).' 00:00:00';
        $end_date = Input::get('end-date', date('Y-m-d')).' 23:59:59';

        $data['materials'] = Material_Transaction::with('material')
                                                 ->select(array('*', DB::raw('sum(quantity) as total')))
                                                 ->where('user_id', '=', Auth::user()->id)
                                                 ->where('quantity', '<', '0')
                                                 ->where_between('created_at', $start_date, $end_date)
                                                 ->group_by('material_id')
                                                 ->get();

        return View::make('admin.reports.materials.usedShow', $data);
    }

    /**
     * Purchased Material Report
     * 
     * @return Response 
     */
    public function get_purchased()
    {
        return View::make('admin.reports.materials.purchasedIndex');
    }

    /**
     * Purchased Material Report
     * 
     * @return Response 
     */
    public function post_purchased()
    {
        $start_date = Input::get('start-date', date('Y-m-d')).' 00:00:00';
        $end_date = Input::get('end-date', date('Y-m-d')).' 23:59:59';

        $data['materials'] = Material_Transaction::with('material')
                                                 ->select(array('*', DB::raw('sum(quantity) as total')))
                                                 ->where('user_id', '=', Auth::user()->id)
                                                 ->where('quantity', '>', '0')
                                                 ->where_between('created_at', $start_date, $end_date)
                                                 ->group_by('material_id')
                                                 ->get();

        return View::make('admin.reports.materials.purchasedShow', $data);
    }
}