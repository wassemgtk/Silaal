<?php
Yep::register('css/yep.css');
$this->breadcrumbs=array(
		Yep::t('Orders')=>array('index'),
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
					array(
						'label' => Yep::t('Ordering Date'),
						'value' => date('d. m. Y G:i',$model->ordering_date)
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
				'country'
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
				'country'
				),
			)); ?>
</div>

<?php 
$this->renderPartial('/paymentmethod/view', array(
	'model' => $model->paymentMethod)); 
$this->renderPartial('/shippingmethod/view', array(
	'model' => $model->shippingMethod)); 
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
