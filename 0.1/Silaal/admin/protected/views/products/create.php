<?php
$this->breadcrumbs=array(
	Yii::t('msg', 'Product')=>array('admin'),
	Yii::t('msg', 'Create'),
);
?>

<div id="shopcontent">

	<h1><?php echo Yii::t('msg', 'Create a new Product'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
