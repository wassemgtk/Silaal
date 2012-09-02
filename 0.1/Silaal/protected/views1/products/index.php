<?php
//$this->breadcrumbs=array(Yep::t('Products'),);
Yep::renderFlash();
?>
<div class="view span-17">
<?php 
$criteria = new CDbCriteria();
$criteria->order = 'id desc';
$featured = Image::model()->findByAttributes(array('featured'=>'1'),$criteria);

//echo Yii::app()->createAbsoluteUrl("/productImages/".$featured->filename); exit;?>

<?php echo CHtml::image(Yii::app()->createAbsoluteUrl("/productimages/".$featured->filename),'Samsung Products',array('width'=>670)); ?>
</div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
		
)); ?>
