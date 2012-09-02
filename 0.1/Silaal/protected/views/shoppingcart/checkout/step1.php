<?php 
$checkout = Yep::getCheckoutContent(); 
if((isset($checkout['panel']) and ($checkout['panel']<0) ) and !isset($checkout['step1']) ) return ;
if(!Yii::app()->user->isGuest){
	$checkout['panel']=1;
}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'checkout-step1-form',
	'enableAjaxValidation'=>false,
)); ?>
	<input type="hidden" name="step" value = "1">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model1); ?>
	<div class="row">
		<?php echo $form->labelEx($model1,Yep::t('account')); ?>
		<?php echo $form->dropDownList($model1,'account',array(Yep::t('Guest'),Yep::t("User Account"))); ?>
		<?php echo $form->error($model1,'account'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton(Yep::t('Continue')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->