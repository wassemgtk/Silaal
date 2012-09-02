<?php
$this->breadcrumbs=array(
	'Product Counters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductCounter', 'url'=>array('index')),
	array('label'=>'Manage ProductCounter', 'url'=>array('admin')),
);
?>

<h1>Create ProductCounter</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>