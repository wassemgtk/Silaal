<fieldset>
<legend> <?php echo Yii::t('msg', 'Product Specifications'); ?> </legend>
<div class="row">
<?php echo $form->labelEx($model,'quantity'); ?>
<?php echo $form->textField($model,'quantity',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'quantity'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'Price'); ?>
<?php echo $form->textField($model,'price',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'price'); ?>
</div>

<?php foreach(ProductSpecification::model()->findAll() as $specification) { ?>
	<div class="row">
		<?php echo CHtml::label($specification->title, ''); ?>
		<?php echo CHtml::textField("Specifications[{$specification->title}]",
				$model->getSpecification($specification->title),array(
					'size'=>45,'maxlength'=>45)); ?>
		</div>
        
		<?php }
		
		 ?>

		</fieldset>