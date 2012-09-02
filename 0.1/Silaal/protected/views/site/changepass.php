<?php
$this->pageTitle=Yii::app()->name . ' - Change password';
$this->breadcrumbs=array(
	'Change password',
);

?>

<h1>Change Password </h1>

<p>Please fill out the following form.</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'changepass-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Confirm Password'); ?>
		<?php echo $form->passwordField($model,'password2'); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Register'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
