<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	protected function beforeAction($action) {
		
		if(!empty($_POST['country_code'])){
			Yii::app()->user->setState('lang', strtolower(trim($_POST['country_code'])));
			$language = Language::model()->findByAttributes(array('code'=>Yii::app()->user->getState('lang')));
			Yii::app()->user->setState('languageId', $language->id);
			Yii::app()->user->setFlash("success","Language is successfully changed.");
			$this->redirect(Yii::app()->homeUrl);
		}
		if(!is_null(Yii::app()->user->getState('lang'))){
			Yii::app()->language = Yii::app()->user->getState('lang');
		}
		if(Yii::app()->language == 'en_us'){
			Yii::app()->language = 'en';
			$language = Language::model()->findByAttributes(array('code'=>'en'));
			Yii::app()->user->setState('languageId', $language->id);
		}
		if(!empty($_POST['currency_code']) and is_numeric($_POST['currency_code'])){
			
			$currency = Currency::model()->findByPk($_POST['currency_code']);
			Yii::app()->session['currency_code'] = $_POST['currency_code'];
			Yii::app()->session['currency_multiplier'] = $currency->multiplier;
			Yii::app()->session['currency_sign'] = $currency->sign;
			
			Yii::app()->user->setFlash("success","Currency is successfully changed.");
			$this->redirect(Yii::app()->homeUrl);
		}
		if(empty(Yii::app()->session['currency_code'])){
			Yii::app()->session['currency_code'] = '1';
			Yii::app()->session['currency_multiplier'] = 1;
			Yii::app()->session['currency_sign'] = '$';
		}
		return true;
		}
}