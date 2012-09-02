<?php
$this->breadcrumbs=array(
	'Languages'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Language', 'url'=>array('index')),
	array('label'=>'Create Language', 'url'=>array('create')),
	array('label'=>'View Language', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Language', 'url'=>array('admin')),
);
?>

<h1>Update Language <?php echo $model->id; ?></h1>
<h2><?php echo CHtml::link('Edit <b>English</b> to <b>'.$model->name.'</b> messages',array('updatemessages','id'=>$model->id));?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>