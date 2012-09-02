<?php
$this->breadcrumbs=array(
	Yep::t('Categories')=>array('view','id'=>$model->category_id),
	Yep::t($model->title),
);
$this->layout='//layouts/column3';
$cat_des = CategoryDescription::model()->findByAttributes(array('category_id'=>$model->category_id,'language_id'=>Yii::app()->user->getstate('languageId')));
?>

<h2> <?php echo is_null($cat_des->title)?$model->title:$cat_des->title; ?></h2>

<?php
	foreach($model->Products as $product) {
		$this->renderPartial('/products/_view', array('data' => $product));
}
?>


<div class="clear"> </div>


