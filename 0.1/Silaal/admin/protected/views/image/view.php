<?php 
$folder = Yii::app()->params->productImagesFolder;

if($model->filename) 
	$path = str_replace("admin", '', Yii::app()->baseUrl). '/' . $folder . '/' . $model->filename;
	else
	$path = Yep::register('no-pic.jpg');

echo CHtml::image($path,
		$model->title,
		array(
			'title' => $model->title,
			'style' => 'margin: 10px;',
			'width' => isset($thumb) && $thumb
			? Yii::app()->params->imageWidthThumb 
			: Yii::app()->params->imageWidth)
		); ?>
<?php 

if(Yii::app()->params->useWithYum && Yii::app()->user->isAdmin()) 
	echo CHtml::link(Yii::t('msg', 'Delete Image'),
			array('delete', 'id' => $model->id)); ?>
