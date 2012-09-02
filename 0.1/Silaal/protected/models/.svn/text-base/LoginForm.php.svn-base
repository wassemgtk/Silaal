<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;
	private $_identity;
	
	public $password2;
	public $firstname;
	public $lastname;
	public $email;
	public $street;
	public $zipcode;
	public $city;
	public $state;
	public $country_id;
	public $verifyCode;
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required','on'=>'login'),
			array('username, password, password2, email, country_id', 'required','on'=>'register'),
			array('email','email','on'=>'register, forgotpassword'),	
			array('password','compare','compareAttribute'=>'password2', 'on'=>'register , changepass'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'on'=>'register, forgotpassword'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean','on'=>'login'),
			// password needs to be authenticated
			array('password', 'authenticate','on'=>'login'),
			array('username', 'unique1','on'=>'register'),
			array('email', 'unique2','on'=>'register'),
			array('email','checkemail','on'=>'forgotpassword'),
			//array('password','checkemail','on'=>'forgotpassword'),
				
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('username','Incorrect username or password.');
		}
	}
	public function unique1($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$unique = User::model()->findByAttributes(array('username'=>$this->username));
			if(count($unique)>0)
				$this->addError('username','Username is not unique.');
		}
	}
	public function unique2($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$unique = User::model()->findByAttributes(array('email'=>$this->email));
			if(count($unique)>0)
				$this->addError('email','Email is not unique.');
		}
	}public function checkemail($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$unique = User::model()->findByAttributes(array('email'=>$this->email));
			if(count($unique)== 0)
				$this->addError('email','Email is not found.');
		}
	}
	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		/* echo $this->username;
		echo $this->password; */
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
