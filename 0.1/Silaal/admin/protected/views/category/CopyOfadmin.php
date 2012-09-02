<?php
	//$dataProvider1= new CActiveDataProvider('Category');
	$model = new Category();
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),//$dataProvider1,
	'filter'=>$model,
	'template'=>"{items}\n{pager}", 
	'columns'=>array(
		array(
			'header'=>'ID',
			'name'=>'category_id',
			'type'=>'raw',
			'value'=>$data->category_id,
			),
		array(
			'header'=>'Parent ID',
			'name'=>'parent_id',
			'type'=>'raw',
			'value'=>$data->parent_id,
			),
		array(
			'header'=>Yii::t('tln','Title'),
			'name'=>'title',
			'type'=>'raw',
			'value'=>$data->title,
			),
		array(
			'header'=>'Description',
			'name'=>'description',
			'type'=>'raw',
			'value'=>$data->description,
			),
		/*array(
			'header'=>'Language',
			'name'=>'language',
			'type'=>'raw',
			'value'=>$data->language,
			),*/
		array(
			'header'=>'Actions',
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("/category/view",array("id" => $data->category_id))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/category/update",array("id" => $data->category_id))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/category/delete",array("id" => $data->category_id))',
		),
	),
	));
?>
<strong><?php echo CHtml::link("Add New Category",array("/category/create")); ?></strong>
