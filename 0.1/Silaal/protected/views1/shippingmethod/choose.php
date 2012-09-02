<?php
$this->renderPartial('/order/waypoint', array('point' => 2));

if(!isset($customer))
	$customer = new Customer;

if(!isset($deliveryAddress))
	if(isset($customer->deliveryAddress))
		$deliveryAddress = $customer->deliveryAddress;
	else
		$deliveryAddress = new DeliveryAddress;

if(!isset($this->breadcrumbs))
	$this->breadcrumbs = array(
			Yep::t('Order'),
			Yep::t('Shipping method'));
			
$form=$this->beginWidget('CActiveForm', array(
			'id'=>'customer-form',
			'action' => array('/order/create'),
			'enableAjaxValidation'=>false,
			)); 
?>

<h2> <?php echo Yep::t('Shipping options'); ?> </h2>

<h3> <?php echo Yep::t('Shipping address'); ?></h3>

<div class="current_address">
	<?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$customer->address,
                'htmlOptions' => array('class' => 'detail-view'),
                'attributes'=>array(
                    'firstname',
                    'lastname',
                    'street',
                    'zipcode',
                    'city',
                    'country'
                    ),
                )); ?>
</div>
<br/>
<?php
echo CHtml::checkBox('toggle_delivery',
			$customer->deliveryAddress !== NULL, array(
				'style' => 'float: left')); 
	echo CHtml::label(Yep::t('alternative delivery address'), 'toggle_delivery', array(
				'style' => 'cursor:pointer'));
	
?>

<div class="form">
	<fieldset id="delivery_information" style="display: none;">
		<div class="payment_address">

			<h3> <?php echo Yep::t('new shipping address'); ?> </h3>
            <p><?php echo Yep::t('Shipping new address'); ?></p>
            
            <div class="row">
                <?php echo $form->labelEx($deliveryAddress,'firstname'); ?>
                <?php echo $form->textField($deliveryAddress,'firstname',array('size'=>45,'maxlength'=>45)); ?>
                <?php echo $form->error($deliveryAddress,'firstname'); ?>
            </div>
        
            <div class="row">
                <?php echo $form->labelEx($deliveryAddress,'lastname'); ?>
                <?php echo $form->textField($deliveryAddress,'lastname',array('size'=>45,'maxlength'=>45)); ?>
                <?php echo $form->error($deliveryAddress,'lastname'); ?>
            </div>
            
            <div class="row">
                <?php echo $form->labelEx($deliveryAddress,'street'); ?>
                <?php echo $form->textField($deliveryAddress,'street',array('size'=>45,'maxlength'=>45)); ?>
                <?php echo $form->error($deliveryAddress,'street'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($deliveryAddress,'city'); ?>
                <?php echo $form->textField($deliveryAddress,'zipcode',array('size'=>10,'maxlength'=>45)); ?>
                <?php echo $form->error($deliveryAddress,'zipcode'); ?>
        
                <?php echo $form->textField($deliveryAddress,'city',array('size'=>32,'maxlength'=>45)); ?>
                <?php echo $form->error($deliveryAddress,'city'); ?>
            </div>
            
            <div class="row">
                <?php echo $form->labelEx($deliveryAddress,'country'); ?>
                <?php echo $form->textField($deliveryAddress,'country',array('size'=>45,'maxlength'=>45)); ?>
                <?php echo $form->error($deliveryAddress,'country'); ?>
            </div>
		</div>
	</fieldset>
<br />
<hr />  
<h3> <?php echo Yep::t('Shipping Method'); ?> </h3>
<p> <?php echo Yep::t('Choose your Shipping method'); ?> </p>

<?php
$i = 0;

foreach(ShippingMethod::model()->findAll() as $method) {
	echo '<div class="row">';
	echo CHtml::radioButton("ShippingMethod", $i == 0, array(
				'value' => $method->id));
	echo '<div class="float-left">';
	echo CHtml::label($method->title, 'ShippingMethod');
	echo CHtml::tag('p', array(), $method->description);
	echo CHtml::tag('p', array(), Yep::t('Price: ') . Yep::priceFormat($method->price));
	echo '</div>';
	echo '</div>';
	echo '<div class="clear"></div>';
	$i++;
}
	?>

	

<?php
 Yii::app()->clientScript->registerScript('toggle', "
	if($('#toggle_delivery').attr('checked'))
		$('#delivery_information').show();
	$('#toggle_delivery').click(function() { 
		$('#delivery_information').toggle(500);
	});
");
?>

    <div class="row buttons">
		<?php
        	echo CHtml::submitButton(Yep::t('Continue'),array('id'=>'next'));
        ?>
	</div>
</div>
<?php $this->endWidget(); ?>