<?php 
$checkout = Yep::getCheckoutContent(); 
if((isset($checkout['panel']) and ($checkout['panel']<1) ) and !isset($checkout['step1']) ) return ;
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'checkout-step2-form',
	'enableAjaxValidation'=>false,
)); ?>
<input type="hidden" name="step" value = "2">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model2); ?>

	<div class="row">
		<?php echo $form->labelEx($model2,Yep::t('firstname')); ?>
		<?php echo $form->textField($model2,'firstname'); ?>
		<?php echo $form->error($model2,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,Yep::t('lastname')); ?>
		<?php echo $form->textField($model2,'lastname'); ?>
		<?php echo $form->error($model2,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,Yep::t('street')); ?>
		<?php echo $form->textField($model2,'street'); ?>
		<?php echo $form->error($model2,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,Yep::t('zipcode')); ?>
		<?php echo $form->textField($model2,'zipcode'); ?>
		<?php echo $form->error($model2,'zipcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,Yep::t('city')); ?>
		<?php echo $form->textField($model2,'city'); ?>
		<?php echo $form->error($model2,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,Yep::t('state')); ?>
		<?php echo $form->textField($model2,'state'); ?>
		<?php echo $form->error($model2,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,Yep::t('country')); ?>
		<?php echo $form->dropDownList($model2,'country_id',CHtml::listData(Country::model()->findAllByAttributes(array('status'=>'2')), 'country_id', 'name')); ?>
		<?php echo $form->error($model2,'country_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model2,Yep::t('email')); ?>
		<?php echo $form->textField($model2,'email'); ?>
		<?php echo $form->error($model2,'email'); ?>
	</div>

	<div class="row buttons">
		
		<?php echo CHtml::submitButton(Yep::t('Continue')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->