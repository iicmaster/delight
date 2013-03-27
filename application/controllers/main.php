<?php

class Main_Controller extends Base_Controller 
{
    public function action_index()
    {
        $data['report'] = Session::get('report');
        return View::make('main.index', $data);
    }
    
    // -------------------------------------------------------------------------

    public function action_about()
    {
        return View::make('main.about');
    }
    
    // -------------------------------------------------------------------------

    public function action_services()
    {
        return View::make('main.services');
    }
    
    // -------------------------------------------------------------------------

    public function action_blog()
    {
        return View::make('main.blog');
    }
    
    // -------------------------------------------------------------------------

    public function action_contact()
    {
        return View::make('main.contact');
    }
    
    // -------------------------------------------------------------------------

    public function action_login()
    {
        $data['report'] = Session::get('report');
        return View::make('main.login',$data);
    }
    
    // -------------------------------------------------------------------------

    public function action_register()
    {
        return View::make('main.register');
    }
    
    // -------------------------------------------------------------------------

    public function action_logout()
    {
        Auth::logout();
        $report['status'] = 'success';
        $report['message'] = 'Logout successful.';

        return Redirect::to_action('main@index')->with('report', $report);
    }
    
    // -------------------------------------------------------------------------
}