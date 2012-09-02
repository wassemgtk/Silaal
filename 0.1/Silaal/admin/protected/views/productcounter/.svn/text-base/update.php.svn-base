<?php
$this->breadcrumbs=array(
	'Product Counters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductCounter', 'url'=>array('index')),
	array('label'=>'Create ProductCounter', 'url'=>array('create')),
	array('label'=>'View ProductCounter', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductCounter', 'url'=>array('admin')),
);
?>

<h1>Update ProductCounter <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>