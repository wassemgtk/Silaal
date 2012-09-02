<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $username;
	public $password;
	public $confirm_password;
	public $firstname;
	public $lastname;
	public $email;
	public $street;
	public $zipcode;
	public $city;
	public $state;
	public $country_id;
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password, email,country_id', 'required'),
			array('password', 'compare', 'compareAttribute'=>'confirm_password', ),
			array('password', 'compare', 'on'=>'register'),
			// password needs to be authenticated
			//array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			
		);
	}

	
}
