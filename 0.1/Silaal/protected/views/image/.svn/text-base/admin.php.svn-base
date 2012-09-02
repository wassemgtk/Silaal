<?php
$this->breadcrumbs=array(
	Yii::t('msg', 'Images') =>array('index'),
	Yii::t('msg', 'Manage'),
);

?>

<div id="shopcontent">

<h1> 
<?php 
echo Yii::t('msg', 'Images for'); 
echo '&nbsp;' . $product->title; 
?>
</h1>

<?php
if($images)
	foreach($images as $image) {
		echo "<label> {$image->title} </label><br />";
		$this->renderPartial('view', array('model' => $image));
	}


echo '<br />';

echo CHtml::link(Yii::t('msg', 'Cancel'), array('/site/index')) . '<br />';
echo CHtml::link(Yii::t('msg', 'Upload new Image'), array('create', 'product_id' => $product->product_id));


?>
</div>
