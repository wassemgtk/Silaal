<?php
$this->breadcrumbs=array(
	'Product Counters',
);

$this->menu=array(
	array('label'=>'Create ProductCounter', 'url'=>array('create')),
	array('label'=>'Manage ProductCounter', 'url'=>array('admin')),
);
?>

<h1>Product Counters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
