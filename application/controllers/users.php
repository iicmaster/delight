<?php

class Users_Controller extends Base_Controller 
{
    public function action_create()
    {
        $data = Input::get();

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
}