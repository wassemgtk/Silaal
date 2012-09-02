<?php
$this->breadcrumbs=array(
	Yii::t('msg', 'Categories')=>array('index'),
	$model->title,
);

?>

<h2> <?php echo $model->title; ?></h2>

<?php
	foreach($model->Products as $product) {
		$this->renderPartial('/products/_view', array('data' => $product));
}
?>


<div class="clear"> </div>


