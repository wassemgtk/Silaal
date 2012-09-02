<?php
$this->breadcrumbs=array(
	Yep::t('Payment Methods')=>array('index'),
	Yep::t('Manage'),
);

$this->menu=array(
	array('label'=>Yep::t('Create PaymentMethod'), 'url'=>array('create')),
);

?>

<h2><?php echo Yep::t('Manage Payment Methods'); ?></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'payment-method-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description',
		'tax_id',
		'price',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
