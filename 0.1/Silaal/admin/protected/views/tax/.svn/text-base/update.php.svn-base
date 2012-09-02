<?php
$this->breadcrumbs=array(
	Yep::t('Taxes')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Yep::t('Update'),
);

$this->menu=array(
	array('label'=>Yep::t('Create Tax'), 'url'=>array('create')),
	array('label'=>Yep::t('View Tax'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yep::t('Manage Tax'), 'url'=>array('admin')),
);
?>

<h2> <?php echo $model->title; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
