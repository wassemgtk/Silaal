<?php 
$checkout = Yep::getCheckoutContent(); 
if((isset($checkout['panel']) and ($checkout['panel']<2) ) and !isset($checkout['step1'])) return ;
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'checkout-step3-form',
	'enableAjaxValidation'=>false,
)); ?>
<input type="hidden" name="step" value = "3">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model3); ?>

	<div class="row">
		<?php echo $form->labelEx($model3,Yep::t('firstname')); ?>
		<?php echo $form->textField($model3,'firstname1'); ?>
		<?php echo $form->error($model3,'firstname1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model3,Yep::t('lastname')); ?>
		<?php echo $form->textField($model3,'lastname1'); ?>
		<?php echo $form->error($model3,'lastname1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model3,Yep::t('street')); ?>
		<?php echo $form->textField($model3,'street1'); ?>
		<?php echo $form->error($model3,'street1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model3,Yep::t('zipcode')); ?>
		<?php echo $form->textField($model3,'zipcode1'); ?>
		<?php echo $form->error($model3,'zipcode1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model3,Yep::t('city')); ?>
		<?php echo $form->textField($model3,'city1'); ?>
		<?php echo $form->error($model3,'city1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model3,Yep::t('state')); ?>
		<?php echo $form->textField($model3,'state1'); ?>
		<?php echo $form->error($model3,'state1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model3,Yep::t('country')); ?>
		<?php echo $form->dropDownList($model3,'country_id1',CHtml::listData(Country::model()->findAllByAttributes(array('status'=>'2')), 'country_id', 'name')); ?>
		<?php echo $form->error($model3,'country_id1'); ?>
	</div>
	
	<div class="row buttons">
	
		<?php echo CHtml::submitButton(Yep::t('Continue')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->