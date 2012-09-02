<?php 
$checkout = Yep::getCheckoutContent(); 
if((isset($checkout['panel']) and ($checkout['panel']<4) ) and !isset($checkout['step1']) ) return ;
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'checkout-step5-form',
	'enableAjaxValidation'=>false,
)); ?>
<input type="hidden" name="step" value = "5">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model5); ?>

	<div class="row">
		<?php echo $form->labelEx($model5,Yep::t('payment method')); ?>
		<?php echo $form->dropDownList($model5,'payment_method',CHtml::listData(PaymentMethod::model()->findAll(), 'id', 'title')); ?>
		<?php echo $form->error($model5,'payment_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model5,Yep::t('payment comment')); ?>
		<?php echo $form->textArea($model5,'payment_comment'); ?>
		<?php echo $form->error($model5,'payment_comment'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton(Yep::t('Continue')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->