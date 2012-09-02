<?php
$this->breadcrumbs=array(
	'Order Positions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrderPosition', 'url'=>array('index')),
	array('label'=>'Manage OrderPosition', 'url'=>array('admin')),
);
?>

<h1>Create OrderPosition</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>