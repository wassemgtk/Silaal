<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php 
		// echo $form->textField($model,'parent_id'); 
		$data = Category::model()->findAll();
		$list[0]='Top Level';	
		foreach($data as $cat){
			if($cat->parent_id>0){
				$list[$cat->category_id]="__|".$cat->title;
			}
			else
			   $list[$cat->category_id] = $cat->title;
		}
		echo $form->dropDownList($model,'parent_id',$list, array('prompt'=>$model->parent_id));
		?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

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

<?php $this->endWidget(); ?>

</div><!-- form -->