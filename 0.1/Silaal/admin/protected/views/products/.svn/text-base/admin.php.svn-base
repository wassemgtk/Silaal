<?php 
$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
);
?>
<?php 
if(Yii::app()->controller->id == 'products'){?>
 <h1>Manage Products</h1> 
<?php }?>
<?php 
$model = new Products();

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'template'=>"{items}\n{pager}",
	'columns'=>array(
		array(
			'header'=>'Product Name',
			'name'=>'product_id',
			'type'=>'raw',
			'value'=>'$data->title',
			),
		array(
			'header'=>'Category Name',
			'name'=>'category_id',
			'type'=>'raw',
			'value'=>'$data->category->title',
			),
		array(
			'header'=>'Tax',
			'name'=>'tax_id',
			'type'=>'raw',
			'value'=>'$data->tax->title',
			),
		array(
				'name'=>'quantity',
				'type'=>'raw',
				'value'=> '$data->quantity<20 ? "<span style=\'color:red;\'><b>".$data->quantity."</b></span>" :$data->quantity',
				),
		array(
			'header'=>'Title',
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
		/* array(
				'header'=>'Image',
				'name'=>'image',
				'type'=>'raw',
				'value'=>'CHtml::image(str_replace("admin", "",Yii::app()->baseUrl).Yii::app()->params->productImagesFolder . "/" . $model->filename,$model->filename)',
				), */	
		array(
			'class'=>'CButtonColumn', 
			'template' => '{update}{delete}',//{images}
			'viewButtonUrl' => 'Yii::app()->createUrl("/products/view",
			array("id" => $data->product_id))',
			'updateButtonUrl' => 'Yii::app()->createUrl("/products/update",
			array("id" => $data->product_id))',
			'deleteButtonUrl' => 'Yii::app()->createUrl("/products/delete",
			array("id" => $data->product_id))',
			/* 'buttons' => array(
				'images' => array(
					'label' => Yii::t('msg', 'images'),
					'url' => 'Yii::app()->createUrl("/image/admin",
					array("product_id" => $data->product_id))',
				), 
			),*/
		),
	)
)
); 


echo "<strong>".CHtml::link(Yep::t('Create a new Product'), array('products/create'))."</strong>";
?>
