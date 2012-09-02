
<?php
	//$dataProvider2= new CActiveDataProvider('Products');
	$model = new Products();
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	//'template'=>"{items}\n{pager}", 
	'dataProvider'=>$model->search(),//$dataProvider2,
	'filter'=>$model,
	'columns'=>array(
		array(
			'header'=>'Product ID',
			'name'=>'product_id',
			'type'=>'raw',
			'value'=>$data->product_id,
			),
		array(
			'header'=>'Category ID',
			'name'=>'category_id',
			'type'=>'raw',
			'value'=>$data->category_id,
			),
		array(
			'header'=>'Tax ID',
			'name'=>'tax_id',
			'type'=>'raw',
			'value'=>$data->tax_id,
			),
		
		array(
			'header'=>'Title',
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
		/*array(
			'header'=>'specifications',
			'name'=>'specifications',
			'type'=>'raw',
			'value'=>$data->specifications,
			),*/
		array(
			'header'=>'Actions',
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("/products/view",array("id" => $data->product_id))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/products/update",array("id" => $data->product_id))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/products/delete",array("id" => $data->product_id))',
		),
	),
	));
?>
<strong><?php echo CHtml::link("Add New Products",array("/products/create")); ?></strong>
