
<?php 

$model = new Order();
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'template'=>"{items}\n{pager}",
	'columns'=>array(
		'order_id',
		'customer.address.firstname',
		'customer.address.lastname',
		array(
			'header'=>'Order Status',	
			'name'=> 'ordering_done',
			'type'=>'raw',
			'value'=> array($model,'gridDataColumn'),
				//'value'=> CHtml::dropDownList(($data->ordering_done == "1") ? "<strong>Completed</strong>" :"<strong>Pending</strong>", $data->ordering_done),
				//array("submit"=>array("/order/admin","act"=>"status_change","id"=>"$data->order_id"),"confirm" => "This will change Order status, Are you sure?")
			),	
		array('name' => 'ordering_date',
			'value' => '$data->ordering_date'),
		array(
			'header'=>'Actions',	
			'class'=>'CButtonColumn', 
			'template' => '{view}',
			'viewButtonUrl' => 'Yii::app()->createUrl("/order/view",array("id" => $data->order_id))',
		),

	),
)); ?>
