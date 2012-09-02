<?php if(!$model->isNewRecord){
	$data = CategoryDescription::model()->findByAttributes(array('category_id'=>$model->category_id,'language_id'=>$id));
	if($data!==null){
	$title = $data->title;
	$description =$data->description;
	}else{
		if($model->language == $id){
			if(!is_null($model->title))$title = $model->title;
			if(!is_null($model->description))$description = $model->description;
		}
	}
}?>
<div class="row">
<?php echo $form->labelEx($model,'title'); ?>

<input id="Products_title" type="text" name="Category[title<?php echo $id?>]" value="<?php if(isset($title)) echo $title?>" maxlength="45" size="45">

<?php echo $form->error($model,'title'); ?>
</div>

<div class="row">

<?php echo $form->labelEx($model,'description'); ?>

<textarea id="Products_description" name="Category[description<?php echo $id?>]" cols="35" rows="6"><?php if(isset($description)) echo $description?></textarea>

<?php echo $form->error($model,'description'); ?>
</div>