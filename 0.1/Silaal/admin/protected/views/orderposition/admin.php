<?php 
$model = new OrderPosition();
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-position-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'template'=>"{items}\n{pager}",
	'columns'=>array(
		'id',
		'order_id',
		array('name'=>'product_id','value'=>'$data->product->title'),
		'amount',
		//'specifications',
		array(
			'header'=>'Actions',
			'class'=>'CButtonColumn',
			'template' => '{view}',
			'viewButtonUrl' => 'Yii::app()->createUrl("/orderposition/view",array("id" => $data->id))',
		),
	),
)); ?>
