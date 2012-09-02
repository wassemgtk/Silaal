<div class="row">
<?php echo $form->labelEx($model,'image'); ?>
<?php echo CHtml::activeFileField($model, 'image',array('size'=>35)); ?>
<?php echo $form->error($model,'image'); ?>
</div>
<div class="product-overview-image">	
<?php 
$folder = Yii::app()->params->productImagesFolder;
//if($model->images->filename) Yii::app()->basePath.'/../../productimages/
$image_name= Image::model()->findAllByAttributes(array("product_id"=>$model->product_id));
foreach($image_name as $img){
	$path = str_replace("admin", "", Yii::app()->baseUrl). $folder. '/thumbs/'.$img->filename; ;
	echo CHtml::image($path,
			$model->title,//alt
			array(
					'title' => $model->title,
					'style' => 'margin: 10px;',
					'width' => '100')
	);
}
	?>
</div>