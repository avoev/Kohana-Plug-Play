<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller_Maintemplate {

	public function action_index()
	{
		#If user already signed-in
		if(Auth::instance()->logged_in()!= 0){
			#redirect to the user account
			Request::instance()->redirect('welcome');
		}

		$this->template->title = __('Please Login');
		$this->template->content = View::factory('login/login');

	}

	public function action_signin()
	{

		#If user already signed-in
		if(Auth::instance()->logged_in()!= 0) {
			#redirect to the user account
			Request::instance()->redirect('welcome');
		}

		#Instantiate a new user
		$user = ORM::factory('user');

		#Check Auth
		$status = $user->login($_POST);

		#If the post data validates using the rules setup in the user model
		if ($status) {
			#redirect to the user account
			Request::instance()->redirect('welcome');

		} else {
			#Get errors for display in view
			$errors = $_POST->errors('signin');
		}

		$this->template->title = __('Login');
		$this->template->content = View::factory('login/login')
		->set('username', $_POST['username'])
		->bind('errors', $errors);


	}

	public function action_register()
	{
		$this->template->title = __('Please Login');
		$this->template->content = View::factory('login/register');

		#If there is a post and $_POST is not empty
		if ($_POST) {
			#Instantiate a new user
			$user = ORM::factory('user');

			#Load the validation rules, filters etc...
			$post = $user->validate_create($_POST);

			#If the post data validates using the rules setup in the user model
			if ($post->check()) {

				#Affects the sanitized vars to the user object
				$user->values($post);

				#create the account
				$user->save();

				#Add the login role to the user
				$login_role = new Model_Role(array('name' =>'login'));
				$user->add('roles',$login_role);

				#sign the user in
				Auth::instance()->login($post['username'], $post['password']);

				#redirect to the user account
				Request::instance()->redirect('welcome');

			} else {
				#Get errors for display in view
				print_r($post->errors('register'));
			}
		}

	}

	public function action_signout()
	{
		#Sign out the user
		Auth::instance()->logout();

		#redirect to the user account and then the signin page if logout worked as expected
		Request::instance()->redirect('login');
	}

} // End Welcome
