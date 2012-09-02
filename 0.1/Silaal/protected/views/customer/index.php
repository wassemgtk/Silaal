<?php
$this->breadcrumbs=array(
	Yii::t('msg', 'Customers'),
);

?>
	<h1> <?php echo Yii::t('msg', 'Customers'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
