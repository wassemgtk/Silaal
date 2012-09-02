<?php 

$model = new Products();

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		'price',
		array(
			'class'=>'CButtonColumn', 
			'template' => '{view}{update}{delete}{images}',
			'viewButtonUrl' => 'Yii::app()->createUrl("/products/view",
			array("id" => $data->product_id))',
			'updateButtonUrl' => 'Yii::app()->createUrl("/products/update",
			array("id" => $data->product_id))',
			'deleteButtonUrl' => 'Yii::app()->createUrl("/products/delete",
			array("id" => $data->product_id))',
			'buttons' => array(
				'images' => array(
					'label' => Yii::t('msg', 'images'),
					'url' => 'Yii::app()->createUrl("/image/admin",
					array("product_id" => $data->product_id))',
				),
			),
		),
	)
)
); 


echo CHtml::link(Yep::t('Create a new Product'), array('products/create'));
?>
