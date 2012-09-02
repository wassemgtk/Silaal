<?php
Yep::register('css/yep.css');
$this->breadcrumbs=array(
		Yep::t('Orders')=>array('admin'),
		$model->order_id,
		);

?>

<h2> <?php echo Yep::t('Order') ?> #<?php echo $model->order_id; ?></h2>

<h3> <?php echo Yep::t('Ordering Info'); ?> </h3>

<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'order_id',
				'customer_id',
				array('name'=>'language_id','value'=>$model->language->name),
				array('name'=>'currency_id','value'=>$model->currency->name.'('.$model->currency->sign.')'),
				array('label'=>'Currency Multiplier','value'=>$model->currency_value),
				array(
					'label' => Yep::t('Ordering Date'),
					'value' => $model->ordering_date,
					),
				'ordering_done',
				'ordering_confirmed',
				),
			)); ?>

<h3> <?php echo Yep::t('Customer Info'); ?> </h3>

<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model->customer,
			'attributes'=>array(
				'email',
				),
			)); ?>

<div class="summary_delivery_address">
<h3> <?php echo Yep::t('Delivery address'); ?> </h3>
<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model->deliveryAddress,
			'attributes'=>array(
				'firstname',
				'lastname',
				'street',
				'zipcode',
				'city',
				array('label'=>'Country','value'=>$model->deliveryAddress->country->name)
				),
			)); ?>
</div>

<div class="summary_billing_address">
<h3> <?php echo Yep::t('Billing address'); ?> </h3>
<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model->billingAddress,
			'attributes'=>array(
				'firstname',
				'lastname',
				'street',
				'zipcode',
				'city',
				array('label'=>'Country','value'=>$model->billingAddress->country->name)
				),
			)); 
?>
</div>


<?php /* $this->renderPartial('/paymentmethod/view', array(
	'model' => $model->paymentMethod));  */
	?>
<h2> <?php echo Yep::t('Payment method') ?> </h2>

<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model->paymentMethod,
			'attributes'=>array(
			'title',
			'description',
			array('label'=>'Price','value'=>Yep::priceFormat($model->paymentMethod->price,$model->currency_id)),
			),
		)); 
// $this->renderPartial('/shippingmethod/view', array(
// 	'model' => $model->shippingMethod)); 
?>
<h2> <?php echo Yep::t('Shipping method');?></h2>
<?php 
$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model->shippingMethod,
		'attributes'=>array(
				'title',
				'description',
				array('label'=>'Price','value'=>Yep::priceFormat($model->shippingMethod->price,$model->currency_id)),
		),
));
?>


<h3> <?php echo Yep::t('Ordered Products'); ?> </h3>

<?php foreach($model->products as $product) {
	$this->widget('zii.widgets.CDetailView', array(
				'data'=>$product,
				'attributes'=> array(
					'product.title',
					'amount',
					array(
						'label' => Yep::t('Specifications'),
						'type' => 'raw',
						'value' => $product->renderSpecifications())
					)
				)
			); 
	echo '<br />';
	echo '<hr />';
}

?>

<div style="clear:both;"> </div>

<div class="buttons"> 
<?php

echo CHtml::link(Yep::t('Delivery slip'), array(
			'/order/slip', 'id' => $model->order_id )); 

echo CHtml::link(Yep::t('Invoice'), array(
			'/order/invoice', 'id' => $model->order_id));  

echo CHtml::link(Yep::t('Back to Orders'), array(
			'/order/admin')); 

?>
</div>
