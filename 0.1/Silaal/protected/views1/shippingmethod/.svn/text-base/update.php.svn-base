<?php
$this->breadcrumbs=array(
	Yep::t('Shipping Methods')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Yep::t('Update'),
);

$this->menu=array(
	array('label'=>Yep::t('Create Shipping method'), 'url'=>array('create')),
	array('label'=>Yep::t('View Shipping method'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yep::t('Manage Shipping methods'), 'url'=>array('admin')),
);
?>

<h2><?php echo $model->title; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
