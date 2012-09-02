
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'products-form',
			//'enableAjaxValidation'=>true,
			'htmlOptions'=>array('enctype'=>'multipart/form-data'),
			)); ?>

<?php echo $form->errorSummary($model); ?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php 
$this->widget('zii.widgets.jui.CJuiTabs', array(
		'tabs'=>array(
				'Basic Info' => $this->renderPartial('forms/_basic',array('model'=>$model,'form'=>$form),$this),
						
				'Image' =>$this->renderPartial('forms/_image',array('model'=>$model,'form'=>$form),$this),
				// panel 3 contains the content rendered by a partial view
				'Specification' => $this->renderPartial('forms/_specification',array('model'=>$model,'form'=>$form),$this),
		),
		// additional javascript options for the tabs plugin
		'options' => array(
				'collapsible' => false,
				'selected'=>0
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
