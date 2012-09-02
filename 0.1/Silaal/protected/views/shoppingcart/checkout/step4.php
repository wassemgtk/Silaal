<?php 
$checkout = Yep::getCheckoutContent(); 
if((isset($checkout['panel']) and ($checkout['panel']<3) ) and !isset($checkout['step4'])) return ;
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'checkout-step4-form',
	'enableAjaxValidation'=>false,
)); ?>
<input type="hidden" name="step" value = "4">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model4); ?>

	<div class="row">
		<?php echo $form->labelEx($model4,Yep::t('Delivery method')); ?>
		<?php echo $form->dropDownList($model4,'delivery_method',CHtml::listData(ShippingMethod::model()->findAll(), 'id', 'title')); ?>
		<?php echo $form->error($model4,'delivery_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model4,Yep::t('delivery comment')); ?>
		<?php echo $form->textArea($model4,'delivery_comment'); ?>
		<?php echo $form->error($model4,'delivery_comment'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton(Yep::t('Continue')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->