<?php
$this->breadcrumbs=array(
	Yep::t('Taxes')=>array('index'),
	Yep::t('Create'),
);

$this->menu=array(
	array('label'=>Yep::t('Manage Tax'), 'url'=>array('admin')),
);
?>

<h2> <?php echo Yep::t('Create Tax'); ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
