<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//Yep::out('asdf');
		$this->redirect(array('/products/index'));
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm('login');

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	public function actionRegister(){
		$model = new LoginForm('register');
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['LoginForm'])){
			$model->attributes = $_POST['LoginForm'];
			
			$user = new User();
			$address = new Address();
			$user->unsetAttributes();
			$address->unsetAttributes();
			
			$user->attributes = $_POST['LoginForm'];
			$address->attributes = $_POST['LoginForm'];
			
			
			foreach($user->attributes as $key=>$value){
				if(isset($_POST['LoginForm'][$key]))
				$user->$key= $_POST['LoginForm'][$key];
			}
			foreach($address->attributes as $key=>$value){
				if(isset($_POST['LoginForm'][$key]))
				$address->$key = $_POST['LoginForm'][$key];
			}
			if($model->validate()){
				if($address->save(false)){
					
					$user->password = md5($user->password);
					$user->address_id = $address->id;
					$user->ip = $_SERVER['REMOTE_ADDR'];
					$user->date_added = date('Y-m-d h:i:s');
					$user->status= '1';
					
					if($user->save(false)){
						if(Yii::app()->user->isGuest)
						$model->login();
						
						$message = new YiiMailMessage;
						$message->setBody("<b>Dear $user->firstname $user->lastname</b>,<br><br>
											Your are now registered user of ".Yii::app()->name.".<br>
											You are registered with <br>
											Username: $model->username<br>
											Password: $model->password<br>
											email: $model->email<br>
											Regards<br>
											".Yii::app()->name." Team.");
						$message->subject = 'Thank you for registration.';
						$message->addTo($model->email);
						$message->from = Yii::app()->params['adminEmail'];
						Yii::app()->mail->send($message);
						
						Yii::app()->user->setFlash("success", "Thank You for registration ! Please check your mailbox.");
						
						$this->redirect(Yii::app()->homeUrl);
					}
				}
			}
		}
		
		$this->render('register', array('model'=>$model));
	}
	public function actionForgotpassword(){
		if(isset($_GET['code'])){
			if(isset($_POST['LoginForm'])){
				$model=new LoginForm('changepass');
				$model->attributes=$_POST['LoginForm'];
				
				foreach($model->attributes as $key=>$value){
					$model->$key= $_POST['LoginForm'][$key];
				}
				if($model->password == $model->password2){
					$id = Yii::app()->user->getState("user_id");
					$umodel=User::model()->findByPk((int)$id);
					if($umodel===null)
						throw new CHttpException(404,'The requested page does not exist.');
					$umodel->password = md5($model->password);
					Yii::app()->user->setFlash("success", "Your password has been successfully changed.");
					$umodel->save();
					$this->redirect(Yii::app()->homeUrl);
				}
				
			}
			//$model = new LoginForm('changepass');
			
			$test = User::model()->findAll();
			$found = false; 
			$id = 0;
			if(count($test)>0){
				foreach($test as $t){
					if(md5($t->id.$t->username) == trim($_GET['code'])){
						$found = true;
						$id = $t->id;
						break;
					}
				
				}
			}else
			{
				Yii::app()->user->setFlash("error", "Sorry,No user account!");
				$this->redirect(Yii::app()->homeUrl);
				
			}
			
			if($found == true ){
				$model=new LoginForm('changepass');//->findByPk((int)$id);
				Yii::app()->user->setState("user_id", "$id");
				$this->render("changepass",array('model'=>$model));
				
			}else{
				Yii::app()->user->setFlash("error", "Sorry,Invalid code!");
				$this->redirect(Yii::app()->homeUrl);
			}
		}
		else{
			$model = new LoginForm('forgotpassword');
			// if it is ajax validation request
			if(isset($_POST['ajax']) && $_POST['ajax']==='register-form'){
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
			if(isset($_POST['LoginForm'])){
				$model->attributes = $_POST['LoginForm'];
				if($model->validate())
				{
					$user =User::model()->findByAttributes(array('email'=>$model->email));
					$link= $this->createAbsoluteUrl('site/forgotpassword', array('code'=>md5($user->id.$user->username)) );
					$message = new YiiMailMessage;
					$message->setBody("<b>Dear $user->firstname $user->lastname</b>,<br><br>
							To recover your password please clink on this link ".CHtml::link($link,$link,array('target'=>'_blank'))."<br>
							Regards,<br>
							".Yii::app()->name." Team.");
					$message->subject = 'Password recovery email-'.Yii::app()->name;
					$message->addTo($model->email);
					$message->from = Yii::app()->params['adminEmail'];
					Yii::app()->mail->send($message);		
					Yii::app()->user->setFlash("success", "Thank You ! Please check your mailbox.");
			
					$this->redirect(Yii::app()->homeUrl);
				}
				
			}
			$this->render('forgotpassword',array('model'=>$model));
		}
		
	}
	
}