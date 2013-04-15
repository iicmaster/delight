<?php

class Users_Controller extends Base_Controller 
{
    public function action_create()
    {
        $data = Input::get();
        $data['password'] = Hash::make(Input::get('password'));

        try {
            $user = User::create($data);

            Auth::login($user->id);
            
            $report['status'] = 'success';
            $report['message'] = 'Register successful.';
        } catch (\Exception $e) {
            $report['status'] = 'error';
            $report['message'] = 'Register failed.';
        }

        return Redirect::to_action('main@index')->with('report', $report);
    }

    // -------------------------------------------------------------------------

    public function action_validate()
    {
        $credentials = array(
            'username' => Input::get('username'), 
            'password' => Input::get('password')
        );
     
        if (Auth::attempt($credentials)) {
            return Redirect::to('/');
        } else {
            $report['status'] = 'error';
            $report['message'] = __('admin.message_invalid_login');
            return Redirect::to('/login')->with('report', $report);
        }
    }

    // -------------------------------------------------------------------------

    public function action_profile()
    {
        $data['user'] = User::find(Auth::user()->id);
        $data['report'] = Session::get('report');
        return View::make('main.profile', $data);
    }

    // -------------------------------------------------------------------------

    public function action_update()
    {
        $id = Auth::user()->id;
        $data = Input::get();

        try {
            $user = User::update($id, $data);
            $report['status'] = 'success';
            $report['message'] = __('admin.message_update_succeed');
        } catch (\Exception $e) {
            $report['status'] = 'error';
            $report['message'] = __('admin.message_update_failed');
        }

        return Redirect::to_action('/profile')->with('report', $report);
    }

    // -------------------------------------------------------------------------
}