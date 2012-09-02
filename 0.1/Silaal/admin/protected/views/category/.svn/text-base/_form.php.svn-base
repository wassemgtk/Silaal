<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row">
	<?php echo $form->labelEx($model,'parent_id'); ?>
	<?php 
	$data = Category::model()->findAll();
	$list[0]='Top Level';	
	foreach($data as $cat){
		if($cat->parent_id>0){
			$list[$cat->category_id]="__|".$cat->title;
		}
		else
		   $list[$cat->category_id] = $cat->title;
	}
	echo $form->dropDownList($model,'parent_id',$list, array('prompt'=>$model->parent_id));
	?>
	<?php echo $form->error($model,'parent_id'); ?>
</div>
<?php 
$lang = Language::model()->findAllByAttributes(array('status'=>'Active'));
$arr = array();
foreach ($lang as $lan){
		$arr[$lan->name]= $this->renderPartial('forms/final',array('model'=>$model,'form'=>$form,'id'=>$lan->id,),$this);
}
$this->widget('zii.widgets.jui.CJuiTabs', array(
		'tabs'=>$arr,
		'options' => array(
				'collapsible' => false,
				'selected'=>0,
		),
));
?>
<div class="row buttons" >
<?php echo CHtml::submitButton($model->isNewRecord ?
		Yii::t('msg', 'Create') 
		: Yii::t('msg', 'Save')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
