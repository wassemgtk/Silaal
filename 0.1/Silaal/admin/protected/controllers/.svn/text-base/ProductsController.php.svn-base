<?php

class ProductsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $_model;
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
				'actions'=>array('index','view','create','update','admin','delete'),
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
		$this->layout='//layouts/column1';
		$model=new Products;
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);
		
		$img_flyer = CUploadedFile::getInstance($model,'image');
		if ((is_object($img_flyer) && get_class($img_flyer)==='CUploadedFile'))
			$model->image = $img_flyer;
		
		if(isset($_POST['Products'])){
			$model->attributes=$_POST['Products'];
			$model->tax_id = $_POST['Products']['tax_id'];
			//$model->
			if(isset($_POST['Specifications']))
				$model->setSpecifications($_POST['Specifications']);
			$lang = Language::model()->findAllByAttributes(array('status'=>'Active'));
			foreach ($lang as $lan){
				if(strtolower($lan->name) == 'english'){
					$model->title = $_POST['Products']['title'.$lan->id];
					$model->description = $_POST['Products']['description'.$lan->id];
					$model->language = $lan->id;
				}
				
			} 
			if($model->save()){
				
				foreach ($lang as $lan){
					$description = new ProductDescription();
					$description->product_id = $model->product_id;
					$description->language_id =$lan->id;
					$description->title = $_POST['Products']['title'.$lan->id];
					$description->description =$_POST['Products']['description'.$lan->id];
					$description->save();
				}
				
				$counter = new ProductCounter();
				$counter->product_id = $model->product_id;
				$counter->save();				
				if($model->image!="")
				{
					$new_name=strtolower(str_replace(" ", "_",$model->title)."_".$model->product_id.".".pathinfo($model->image, PATHINFO_EXTENSION));
					
					if (is_object($img_flyer))
					{
						$model->image->saveAs(Yii::app()->basePath . '/../../productimages/'. $new_name);
						$image = Yii::app()->image->load(Yii::app()->basePath . '/../../productimages/'.$new_name);
						$image->resize(600,480,Image::HEIGHT);
						$image->save();
						
						@copy(Yii::app()->basePath.'/../../productimages/'.$new_name,
						Yii::app()->basePath.'/../../productimages/thumbs/'.$new_name);
						$imageT = Yii::app()->image->load(Yii::app()->basePath . '/../../productimages/thumbs/' .$new_name);
						$imageT->resize(150, 150);
						$imageT->save();
						
						$command = Yii::app()->db->createCommand();
						$command->insert(Yii::app()->params->imageTable, array(
								'title'=> $model->title,
								'filename'=>$new_name,
								'product_id'=>$model->product_id,
						));
						/* $img = new Image();
						$img->title = $model->title;
						$img->filename= $new_name;
						$img->product_id = $model->product_id; */
					}
					
				}
				$this->redirect(Yii::app()->homeUrl);
			}
			//$this->redirect(array('/products/index'));
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
		 $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			
			$model->attributes=$_POST['Products'];
			if(isset($_POST['Specifications']))
				$model->setSpecifications($_POST['Specifications']);
			/* if(isset($_POST['Variations']))
				$model->setVariations($_POST['Variations']); */
			
			$img_flyer = CUploadedFile::getInstance($model,'image');
			if ((is_object($img_flyer) && get_class($img_flyer)==='CUploadedFile'))
				$model->image = $img_flyer;
			
			$lang = Language::model()->findAllByAttributes(array('status'=>'Active'));
			foreach ($lang as $lan){
				if(strtolower($lan->name) == 'english'){
					$model->title = $_POST['Products']['title'.$lan->id];
					$model->description = $_POST['Products']['description'.$lan->id];
					$model->language = $lan->id;
				}
			}
			
			if($model->save()){
				
				foreach ($lang as $lan){
					$description = ProductDescription::model()->findByAttributes(array('product_id'=>$model->product_id,"language_id"=>$lan->id));
					if($description ===null){
						$description = new ProductDescription();
					}
						$description->product_id = $model->product_id;
						$description->language_id =$lan->id;
						$description->title = $_POST['Products']['title'.$lan->id];
						$description->description =$_POST['Products']['description'.$lan->id];
						$description->save();
				}
				
				if($model->image!="")
				{
					
					$new_name=strtolower(str_replace(" ", "_",$model->title)."_".$model->product_id.".".pathinfo($model->image, PATHINFO_EXTENSION));
					
					$command = Yii::app()->db->createCommand();
					/* $var=$command->select('filename,count(*) as num')->from(Yii::app()->params->imageTable)->queryRow();
					if($var['num']>0){ */
					//unlink(Yii::app()->basePath . '/../../productimages/'. $var['filename']);
					//unlink(Yii::app()->basePath . '/../../productimages/thumbs/'. $var['filename']);
					//@$command->delete(Yii::app()->params->imageTable, array('product_id'=>$model->product_id,));
					//}
					
					if (is_object($img_flyer) )
					{
						$model->image->saveAs(Yii::app()->basePath . '/../../productimages/'. $new_name);
						$image = Yii::app()->image->load(Yii::app()->basePath . '/../../productimages/'.$new_name);
						$image->resize(600,480,Image::HEIGHT);
						$image->save();
						
				
						@copy(Yii::app()->basePath.'/../../productimages/'.$new_name,
								Yii::app()->basePath.'/../../productimages/thumbs/'.$new_name);
						$imageT = Yii::app()->image->load(Yii::app()->basePath . '/../../productimages/thumbs/' .$new_name);
						$imageT->resize(200, 150);
						$saved = $imageT->save();
						
						$updated = $command->update(Yii::app()->params->imageTable, array(
								'title'=> $model->title,
								'filename'=>$new_name,),
								"product_id=$model->product_id"
						);
						if(!$updated and $saved){
							$insert =$command->insert(Yii::app()->params->imageTable,array(
									'title'=> $model->title,
									'filename'=>$new_name,
									"product_id"=>$model->product_id,
									"featured"=>0,
									)) ;
						}
					}				
				}
				if(isset($return) and $return == 'product')
					$this->redirect(array('products/update', 'id' => $model->product_id));
				else
					$this->redirect(array('products/admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
		
		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//Yep::out(ProductDescription::model()->findAllByAttributes(array('product_id'=>13)));
		//exit;
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=$this->loadModel($id);
			$img = Image::model()->findByAttributes(array("product_id" => $model->product_id));
			if(count($img)>0)
			{
				@unlink(Yii::app()->basePath . '/../../productimages/'. $img->filename);
				@unlink(Yii::app()->basePath . '/../../productimages/thumbs/'. $img->filename);
				$img->delete();
			}
			$counter = ProductCounter::model()->findByAttributes(array('product_id'=>$model->product_id));
			if(!($counter === null)){
				$counter->delete();
			}
			$descriptions = ProductDescription::model()->findAllByAttributes(array('product_id'=>$model->product_id));
			if($descriptions !== null){
				foreach ($descriptions as $des)
					$des->delete();
			}
			$variations = ProductVariation::model()->findAllByAttributes(array('product_id'=>$model->product_id));
			if(!is_null($variation)){
				foreach ($variations as $variation)
					$variation->delete();
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
		$dataProvider=new CActiveDataProvider('Products');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];
		
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
		/* $model=Products::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
		 */
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Products::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
