<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'country-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iso_code_2'); ?>
		<?php echo $form->textField($model,'iso_code_2',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'iso_code_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iso_code_3'); ?>
		<?php echo $form->textField($model,'iso_code_3',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'iso_code_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_format'); ?>
		<?php echo $form->textArea($model,'address_format',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address_format'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'postcode_required'); ?>
		<?php echo $form->dropDownList($model,'postcode_required',array("0"=>"Not Required",'1'=>'Required')); ?>
		<?php echo $form->error($model,'postcode_required'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array('2'=>'Active','1'=>'Passive')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->