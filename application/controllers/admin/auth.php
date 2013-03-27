<?php

class Admin_Auth_Controller extends Base_Controller 
{
    public function action_login()
    {
        $data['message'] = Session::get('message');
        return View::make('admin.login', $data);
    }

    // --------------------------------------------------------------------------

    public function action_logout()
    {
        Auth::logout();
        return Redirect::to('admin/auth/login');
    }

    // --------------------------------------------------------------------------

    public function action_validate()
    {    
        $credentials = array(
            'username' => Input::get('username'), 
            'password' => Input::get('password')
        );
     
        if (Auth::attempt($credentials)) {
            return Redirect::to('admin/home');
        } else {
            return Redirect::to('admin/auth/login')->with('message', __('admin.message_invalid_login'));
        }
    }

    // --------------------------------------------------------------------------

}