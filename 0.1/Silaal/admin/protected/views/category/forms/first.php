
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php 
		//echo $form->textField($model,'language',array('size'=>45,'maxlength'=>45)); 
		$data = Language::model()->findAll(); 
		$list = array();
		foreach($data as $lang)
		$list[$lang->id]=$lang->name;//."[".$lang->code."]";
		
		echo $form->dropDownList($model,"language",$list, array('prompt'=>$model->language));
		?>
		<?php echo $form->error($model,'language'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
