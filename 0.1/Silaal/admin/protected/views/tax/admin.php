<?php
$this->breadcrumbs=array(
	Yep::t('Taxes')=>array('index'),
	Yep::t('Manage'),
);

$this->menu=array(
	array('label'=>Yep::t('Create Tax'), 'url'=>array('create')),
);

?>

<h2> <?php echo Yep::t('Manage Taxes'); ?></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tax-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'percent',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
