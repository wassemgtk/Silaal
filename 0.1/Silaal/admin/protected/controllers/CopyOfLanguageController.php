<?php

class LanguageController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete','updatemessages'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Language;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Language']))
		{
			$model->attributes=$_POST['Language'];
			if($model->save()){
				$folder = $model->code;
				$frontend_message_folder = dirname(dirname(Yii::getPathOfAlias('application'))).
				DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'messages'.DIRECTORY_SEPARATOR;
				
				$path = $frontend_message_folder.$folder;
				// create language folder.
				if(!is_dir($path)){
					mkdir($path);
				}
				// create template file 
				$newfile = $path.DIRECTORY_SEPARATOR.'msg.php';
				if(!is_file($newfile))
				copy($frontend_message_folder.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'msg.php',$path.DIRECTORY_SEPARATOR.'msg.php');
				// Page redirection.
				$this->redirect(array('view','id'=>$model->id));
				
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Language']))
		{
			$model->attributes=$_POST['Language'];
			if($model->save())
				$folder = $model->code;
				$frontend_message_folder = dirname(dirname(Yii::getPathOfAlias('application'))).
				DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'messages'.DIRECTORY_SEPARATOR;
				
				$path = $frontend_message_folder.$folder;
				// create language folder.
				if(!is_dir($path)){
					mkdir($path);
				}
				// create template file
				$newfile = $path.DIRECTORY_SEPARATOR.'msg.php';
				if(!is_file($newfile))
					copy($frontend_message_folder.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'msg.php',$path.DIRECTORY_SEPARATOR.'msg.php');
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model messages contained inside frontend messages folder.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdatemessages($id)
	{
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$path = dirname(dirname(Yii::getPathOfAlias('application'))).DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'messages'.DIRECTORY_SEPARATOR;
		Yii::setPathOfAlias('msgfolder', $path.$model->code);
		Yii::setPathOfAlias('cmnfolder', $path.'common');
		$messageFile = 'msg.php';
		
		Yii::import('cmnfolder.*');
		$commonData = require $messageFile;
		$changes = false;
		if(isset($_POST['Messages']) || isset($_POST['key'])){
			
			$filename = yii::getPathOfAlias('msgfolder').DIRECTORY_SEPARATOR.$messageFile;
			
			$string   = "<?php \n return array( \n";
			foreach($_POST['Messages'] as $key => $val) {
				if(!($_GET['action']=='del' and $_GET['key']==$key)){
					$string .= "'".strtolower(trim($key))."' => '$val',\n";
					if(!isset($commonData[$key])){
						$commonData[$key]=$val;
						$changes=true;
					}
				}
			}
			if(isset($_POST['key']) and !empty($_POST['key'])){
				$string .= "'".strtolower(trim($_POST['key']))."' => '".$_POST['value']."',\n";
				if(!isset($commonData[$_POST['key']])){
					$commonData[$_POST['key']]=$val;
					$changes=true;
				}
			}
			$string.=');';
			
			file_put_contents($filename, $string);
			
			if($changes){
				$filename = yii::getPathOfAlias('cmnfolder').DIRECTORY_SEPARATOR.$messageFile;
				
				$string   = "<?php \n return array( \n";
				foreach($commonData as $key => $val) {
						$string .= "'".strtolower(trim($key))."' => '',\n";
				}
				$string.=');';
				
				file_put_contents($filename, $string);
			}
			$this->redirect(array('language/updatemessages','id'=>$model->id));
		}
		Yii::import('msgfolder.*');
		$data = require $messageFile;
		$this->render('updatemessages',array(
				'model'=>$model,'data'=>$data,
		));
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model =$this->loadModel($id);
			$folder = $model->code;
			$frontend_message_folder = dirname(dirname(Yii::getPathOfAlias('application'))).
			DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'messages'.DIRECTORY_SEPARATOR;
			
			$path = $frontend_message_folder.$folder;
			
			$newfile = $path.DIRECTORY_SEPARATOR.'msg.php';
			if(!is_file($newfile))
				@unlink($newfile);
			
			if(!is_dir($path)){
				@rmdir($path);
			}
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Language');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new Language('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Language']))
			$model->attributes=$_GET['Language'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Language::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='language-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
