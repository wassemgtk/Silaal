<?php
$this->breadcrumbs=array(
	'Images'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Yii::t('msg', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('msg', 'List') . 'Image', 'url'=>array('index')),
	array('label'=>Yii::t('msg', 'Create') . 'Image', 'url'=>array('create')),
	array('label'=>Yii::t('msg', 'View') . 'Image', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('msg', 'Manage') . 'Image', 'url'=>array('admin')),
);
?>

<h1>Bearbeite Image <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
