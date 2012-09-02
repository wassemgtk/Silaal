
<div id="shopcontent">

<h1>
Manage Feature Images: 
</h1>

<?php
if($images)
	foreach($images as $image) {
		echo "<label><b>".ucfirst($image->title)."</b> </label><br />";
		$this->renderPartial('view', array('model' => $image));
		echo '</br>';
		echo CHtml::linkButton('Delete', array(
			'submit'=>array('/image/delete','id'=>$image->id),
			'confirm'=>"Are you sure to delete feature image ?",
		));
		echo '</br>';
	}
echo '<br />';
echo CHtml::link('Cancel', array('/site/index')) . '<br />';
echo CHtml::link('Upload', array('image/createfeature'));

?>
</div>
