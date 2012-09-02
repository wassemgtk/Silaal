<?php 
function renderVariation($variation, $i) { 
	if(!ProductSpecification::model()->findByPk(1))
		return false;
	if(!$variation) {
		$variation = new ProductVariation;
		$variation->specification_id = 1;
	}

	$str = '<tr> <td>';
	$str .= CHtml::dropDownList("Variations[{$i}][specification_id]",
			$variation->specification_id, CHtml::listData(
				ProductSpecification::model()->findall(), "id", "title"), array(
				'empty' => '-'));  

	$str .= '</td> <td>';
	$str .= CHtml::textField("Variations[{$i}][title]", $variation->title); 
	$str .= '</td> <td>';
	$str .= CHtml::dropDownList("Variations[{$i}][sign]",
			$variation->price_adjustion >= 0 ? '+' : '-', array(
				'+' => '+',
				'-' => '-'));
	$str .= '</td> <td>';
	$str .= CHtml::textField("Variations[{$i}][price_adjustion]", abs($variation->price_adjustion));  
	$str .= '</td> <td>';
	for($j = -10; $j <= 10; $j++)
		$positions[$j] = $j;
	$str .= CHtml::dropDownList("Variations[{$i}][position]",
			$variation->position,
			$positions);
	$str .= '</td> </tr>';

return $str;
} ?>

<?php 
$content1 = 'adf1';
$content2 = 'adsf2';

$content3 = 'sdfa3';


?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'products-form',
			'enableAjaxValidation'=>true,
			'htmlOptions'=>array('enctype'=>'multipart/form-data'),
			)); ?>

<?php echo $form->errorSummary($model); ?>

<div style="float: left;">
<fieldset>
<legend> <?php echo Yep::t('Product Information'); ?> </legend>
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
<?php echo $form->labelEx($model,'language'); ?>
<?php 	$data = Language::model()->findAll(); 
		$list = array();
		foreach($data as $lang)
		$list[$lang->id]=$lang->name;//."[".$lang->code."]";
		
		echo $form->dropDownList($model,"language",$list, array('prompt'=>$model->language,'options'=>array(isset($model->language)?$model->language:3=>array("selected"=>"selected"))));
		 ?>
<?php echo $form->error($model,'language'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'tax_id'); ?>
<?php 	$data = Tax::model()->findAll(); 
		$list = array();
		foreach($data as $tax)
		$list[$tax->id]=$tax->title;//."[".$lang->code."]";
		
		echo $form->dropDownList($model,"tax_id",$list, array('prompt'=>$model->tax_id,'options'=>array(isset($model->tax_id)?$model->tax_id:1=>array("selected"=>"selected"))));
		 ?>
<?php echo $form->error($model,'tax_id'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'title'); ?>
<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'title'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'description'); ?>
<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>35)); ?>
<?php echo $form->error($model,'description'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'image'); ?>
<?php echo CHtml::activeFileField($model, 'image',array('size'=>35)); ?>
<?php echo $form->error($model,'image'); ?>
</div>
<div class="product-overview-image">	
<?php 
$folder = Yii::app()->params->productImagesFolder;
//if($model->images->filename) Yii::app()->basePath.'/../../productimages/
$image_name= Image::model()->findAllByAttributes(array("product_id"=>$model->product_id));
foreach($image_name as $img){
	$path = str_replace("admin", "", Yii::app()->baseUrl). $folder. '/thumbs/'.$img->filename; ;
	echo CHtml::image($path,
			$model->title,//alt
			array(
					'title' => $model->title,
					'style' => 'margin: 10px;',
					'width' => '100')
	);
}
	?>
</div>
	

</fieldset>
</div>


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
<?php if(!$model->isNewRecord and false) { ?>
		<!-- <fieldset>
		<legend> <?php echo Yep::t('Product Variations'); ?> </legend>
		

<table>
		<?php 
		printf('<tr><th>%s</th><th>%s</th><th colspan = 2>%s</th><th>%s</th></tr>',
				Yep::t('Specification'), 
				Yep::t('Value'), 
				Yep::t('Price adjustion'),
				Yep::t('Position'));


		$i = 0;
		foreach($model->variations as $variation) { 
			echo renderVariation($variation, $i); 
			$i++;
		}

			echo renderVariation(null, $i); 
 ?>
	</table>	
	<?php echo CHtml::button(Yep::t('Save specifications'), array(
				'submit' => array(
					'/products/update',
					'return' => 'product',
					'id' =>$model->product_id))); ?>


				</fieldset>

<?php 
		 
		 
		 } ?>


				<div class="row buttons" >
				<?php echo CHtml::submitButton($model->isNewRecord ?
						Yii::t('msg', 'Create') 
						: Yii::t('msg', 'Save')); ?>
				</div>

				<?php $this->endWidget(); ?>

				</div><!-- form -->
<?php 
$this->widget('zii.widgets.jui.CJuiTabs', array(
		'tabs' => array(
				'Info' => $content1,
				'Image' => $content2,
				// panel 3 contains the content rendered by a partial view
				'Specification' => $content3,
		),
		// additional javascript options for the tabs plugin
		'options' => array(
				'collapsible' => false,
		),
));
?>

