<div class="row">
<?php echo $form->labelEx($model,'category_id'); ?>
<?php $this->widget('application.components.Relation', array(
			'model' => $model,
			'relation' => 'category',
			'fields' => 'title',
			'showAddButton' => false)); ?>
<?php echo $form->error($model,'category_id'); ?>
</div>
<div class="row">
<?php echo $form->labelEx($model,'Tax Rate'); ?>
<?php echo $form->dropDownList($model,'tax_id',CHtml::listData(Tax::model()->findAll(), 'id', 'title'));?>
<?php echo $form->error($model,'tax_id'); ?>
</div>
 <?php 
$lang = Language::model()->findAllByAttributes(array('status'=>'Active'));
$arr = array();
foreach ($lang as $lan){
		$arr[$lan->name]= $this->renderPartial('//products/forms/_final',array('model'=>$model,'form'=>$form,'id'=>$lan->id,),$this);
}
$this->widget('zii.widgets.jui.CJuiTabs', array(
		'tabs'=>$arr,
		'options' => array(
				'collapsible' => false,
				//'selected'=>2,
		),
));
?>







		
