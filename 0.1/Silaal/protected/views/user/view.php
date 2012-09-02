<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View your profile info:</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'username',
		//'password',
		array(
			'label'=>'Fullname',		
			'type'=>'raw',	
			'value'=>CHtml::encode($model->firstname.' '.$model->lastname),	
				),
		//'firstname',
		//'lastname',
		'email',
		array(
			'label'=>'Address',
			'type'=>'raw',
			'value'=>CHtml::encode($model->address->street.', '.$model->address->city.', '.$model->address->state.', '.$model->address->country->name),		
				),
		//'ip',
		array(
			'label'=>'Status',		
			'type'=>'raw',	
			'value'=>($model->status == '1')? "Active":"Passive",	
				),
		'date_added',
	),
)); 
?>
<br>
<br>
<div class="row"><h3><?php echo CHtml::link("Edit",$this->createUrl('/user/update/'.$model->id))?></h3></div>
