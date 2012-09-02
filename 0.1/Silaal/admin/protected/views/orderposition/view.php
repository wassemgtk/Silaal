<?php
$this->breadcrumbs=array(
	'Order Positions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrderPosition', 'url'=>array('index')),
	array('label'=>'Create OrderPosition', 'url'=>array('create')),
	array('label'=>'Update OrderPosition', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrderPosition', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderPosition', 'url'=>array('admin')),
);
?>

<h1>View OrderPosition #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_id',
		'product_id',
		'amount',
		'specifications',
	),
)); ?>
