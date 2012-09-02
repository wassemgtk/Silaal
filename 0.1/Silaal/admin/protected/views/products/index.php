<?php
$this->breadcrumbs=array(
	Yep::t('Products'),
);
Yep::renderFlash();
?>

<h2><?php echo Yep::t('All products'); ?></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
