<?php

class ImageController extends Controller
{
	public $_model;

	public function beforeAction($action) {
		$this->layout = '//layouts/column1';
		return parent::beforeAction($action);
	}

	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

public function actionCreate()
	{
		$model=new Image('productImage');

		if(isset($_POST['Image']))
		{
			$model->attributes=$_POST['Image'];
			$model->filename = CUploadedFile::getInstance($model, 'filename');
			if($model->save()) {
				$folder = Yii::app()->params->productImagesFolder; 
				$model->filename->saveAs($folder . '/' . $model->filename);
				$this->redirect(array('/products/admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionCreatefeature()
	{
		$model=new Image('feature');

		if(isset($_POST['Image']))
		{
			$model->attributes=$_POST['Image'];
			$model->filename = CUploadedFile::getInstance($model, 'filename');
			$model->featured = '1';
			/* print_r($model->attributes);
			exit; */
			if($model->save()) {
				//$model->image->saveAs(Yii::app()->basePath . '/../../productimages/'. $new_name);
				
				//$folder = Yii::app()->params->productImagesFolder; 
				$model->filename->saveAs(Yii::app()->basePath . '/../../productimages/' . $model->filename);
				Yii::app()->user->setFlash("success", "Featured Image is created successfully");
				$this->redirect(array('/image/featureadmin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate()
	{
		$model=$this->loadModel();

		// $this->performAjaxValidation($model);

		if(isset($_POST['Image']))
		{
			$model->attributes=$_POST['Image'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete()
	{
			$this->loadModel()->delete();

			if(!isset($_POST['ajax'])){
				Yii::app()->user->setFlash('success', 'Image has been successfully deleted.');
				$this->redirect(Yii::app()->homeUrl);
			}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Image');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$product = Products::model()->findByPk($_GET['product_id']);

		$images = $product->images;

		$this->render('admin',array( 'images'=>$images, 'product' => $product));
	}
	
	public function actionFeatureadmin()
	{
		$images = Image::model()->findAllByAttributes(array('featured'=>1));
		$this->render('featureadmin',array( 'images'=>$images));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Image::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='image-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
