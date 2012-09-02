<?php
$this->breadcrumbs=array(
	'Static Pages',
);

$this->menu=array(
	array('label'=>'Create StaticPages', 'url'=>array('create')),
	array('label'=>'Manage StaticPages', 'url'=>array('admin')),
);
?>

<h1>Static Pages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
