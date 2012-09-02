<?php
$this->breadcrumbs=array(
	'Shopping Carts'=>array('index'),
	$model->cart_id=>array('view','id'=>$model->cart_id),
	Yii::t('msg', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('msg', 'List') . 'ShoppingCart', 'url'=>array('index')),
	array('label'=>Yii::t('msg', 'Create') . 'ShoppingCart', 'url'=>array('create')),
	array('label'=>Yii::t('msg', 'View') . 'ShoppingCart', 'url'=>array('view', 'id'=>$model->cart_id)),
	array('label'=>Yii::t('msg', 'Manage') . 'ShoppingCart', 'url'=>array('admin')),
);
?>

<h1>Bearbeite ShoppingCart <?php echo $model->cart_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
