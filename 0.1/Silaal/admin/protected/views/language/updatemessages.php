<?php
$this->breadcrumbs=array(
	'Languages'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

/* $this->menu=array(
	array('label'=>'List Language', 'url'=>array('index')),
	array('label'=>'Create Language', 'url'=>array('create')),
	array('label'=>'View Language', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Language', 'url'=>array('admin')),
); */
$this->layout ='column1';
?>
<h1>Update messages :</h1>
<?php if(strtolower($model->name) == 'english'){ Yii::app()->user->setFlash('error', 'No translation is available for English language'); return;}?>
<br>
<form  name='form' method = 'post'>
<?php 
foreach($data as $key=>$value){
	echo '<div class="row"><b>'.$key.':</b>&nbsp;&nbsp;<input type="text" name="Messages['.$key.']" value="'.$value.'"> '
	.
	CHtml::linkButton('Delete', array(
			'submit'=>array('/language/updatemessages','id'=>$model->id,'action'=>'del','key'=>$key),
			'confirm'=>"Are you sure to delete Review?",
	)).
	'</div>';
}
if($_GET['action']=='add')
	echo '<div class="row"><p><b>English Word: </b><input type="text" name="key" value="">
			<b> '.$model->name.' Word: </b><input type="text" name="value" value=""></p></div>';
else 
	echo '<h2>'.CHtml::link('Add new word',array('/Language/updatemessages','id'=>$model->id,'action'=>'add')).'</h2>';
?>

<input type="submit" name="Submit" value="Submit">

</form>