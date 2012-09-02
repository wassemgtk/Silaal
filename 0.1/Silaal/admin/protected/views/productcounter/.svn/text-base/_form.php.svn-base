<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-counter-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'product_id'); ?>
		<?php echo $form->textField($model,'product_id'); ?>
		<?php echo $form->error($model,'product_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'view_counter'); ?>
		<?php echo $form->textField($model,'view_counter'); ?>
		<?php echo $form->error($model,'view_counter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purchase_counter'); ?>
		<?php echo $form->textField($model,'purchase_counter'); ?>
		<?php echo $form->error($model,'purchase_counter'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->