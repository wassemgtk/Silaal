<?php
$this->breadcrumbs=array(
	Yii::t('msg','Orders'),
);

?>
<h1>My Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
