<?php
$this->breadcrumbs=array(
	'Product Specifications'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yep::t('Specifications'), 'url'=>array('index')),
	array('label'=>Yep::t('New Specification'), 'url'=>array('create')),
);

?>

<h2><?php echo Yep::t('Manage Product Specifications'); ?></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-specification-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		'is_user_input',
		'required',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
