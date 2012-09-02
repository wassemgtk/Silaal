<?php
$this->breadcrumbs=array(
	'Static Pages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StaticPages', 'url'=>array('index')),
	array('label'=>'Manage StaticPages', 'url'=>array('admin')),
);
?>

<h1>Create StaticPages</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>