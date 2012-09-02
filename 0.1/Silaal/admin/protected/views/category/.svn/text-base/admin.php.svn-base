<?php 
$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
);
?>
<?php if(Yii::app()->controller->id == 'category'){?>
 <h1>Manage Categories</h1> 
<?php }?>
<?php 
$model = new Category();

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'template'=>"{items}\n{pager}",
	'columns'=>array(
		/* array(
			'header'=>'ID',
			'name'=>'category_id',
			'type'=>'raw',
			'value'=>$data->category_id,
			), */
		array(
			'header'=>'Parents',
			'name'=>'parent_id',
			'type'=>'raw',
			'value'=>array($model,'gridDataColumn'),//$data->parent_id,
			),
		array(
			'header'=>Yii::t('tln','Title'),
			'name'=>'title',
			'type'=>'raw',
			'value'=>'$data->title',
			),
		array(
			'header'=>'Description',
			'name'=>'description',
			'type'=>'raw',
			'value'=>'$data->description',
			),
		array(
			'class'=>'CButtonColumn', 
			'viewButtonUrl' => 'Yii::app()->createUrl("/category/view",
			array("id" => $data->category_id))',
			'updateButtonUrl' => 'Yii::app()->createUrl("/category/update",
			array("id" => $data->category_id))',
			'deleteButtonUrl' => 'Yii::app()->createUrl("/category/delete",
			array("id" => $data->category_id))',
		),
	),
)); 

echo "<strong>".CHtml::link(Yii::t('msg', 'Create a new Category'), array('category/create'))."</strong>";

?>
