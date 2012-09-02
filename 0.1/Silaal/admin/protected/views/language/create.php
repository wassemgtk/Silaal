<?php
$this->breadcrumbs=array(
	'Languages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Language', 'url'=>array('index')),
	array('label'=>'Manage Language', 'url'=>array('admin')),
);
?>

<h1>Create Language</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>