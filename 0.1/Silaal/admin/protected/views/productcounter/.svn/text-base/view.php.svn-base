<?php
$this->breadcrumbs=array(
	'Product Counters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductCounter', 'url'=>array('index')),
	array('label'=>'Create ProductCounter', 'url'=>array('create')),
	array('label'=>'Update ProductCounter', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductCounter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductCounter', 'url'=>array('admin')),
);
?>

<h1>View ProductCounter #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'view_counter',
		'purchase_counter',
	),
)); ?>
