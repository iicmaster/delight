<?php

class Main_Controller extends Base_Controller 
{
	public function action_index()
	{
		return View::make('main.index');
	}
	
	// --------------------------------------------------------------------------

	public function action_about()
	{
		return View::make('main.about');
	}
	
	// --------------------------------------------------------------------------

	public function action_services()
	{
		return View::make('main.services');
	}
	
	// --------------------------------------------------------------------------

	public function action_blog()
	{
		return View::make('main.blog');
	}
	
	// --------------------------------------------------------------------------

	public function action_contact()
	{
		return View::make('main.contact');
	}
	
	// --------------------------------------------------------------------------

	public function action_signin()
	{
		return View::make('main.signin');
	}
	
	// --------------------------------------------------------------------------

	public function action_signup()
	{
		return View::make('main.signup');
	}
	
	// --------------------------------------------------------------------------
}