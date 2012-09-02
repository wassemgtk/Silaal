<?php
$this->renderPartial('/order/waypoint', array('point' => 4));

$this->breadcrumbs=array(
		Yep::t('Order')=>array('index'),
		Yep::t('New Order'),
		);
?>

<?php 
Yep::renderFlash();
echo CHtml::beginForm(array('/order/confirm'));
echo '<h2>'.Yep::t('Confirmation').'</h2>';


if(Yep::getCartContent() == array())
	return false;

	// If the customer is not passed over to the view, we assume the user is 
	// logged in and we fetch the customer data from the customer table
if(!isset($customer))
	$customer = Yep::getCustomer();
	$this->renderPartial('application.modules.shop.views.customer.view', array(
				'model' => $customer,
				'hideAddress' => true,
				'hideEmail' => true));
echo '<br />';
echo '<hr />';
				
				
echo '<p>';
	$shipping = ShippingMethod::model()->findByPk(Yii::app()->user->getState('shipping_method'));
	echo '<strong>'.Yep::t('Shipping Method').': </strong>'.' '.$shipping->title.' ('.$shipping->description.')';
	echo '<br />';
	echo CHtml::link(Yep::t('Edit shipping method'), array(
			'/shippingmethod/choose', 'order' => true));
			echo '</p>';


echo '<p>';
	$payment = 	PaymentMethod::model()->findByPk(Yii::app()->user->getState('payment_method'));
	echo '<strong>'.Yep::t('Payment method').': </strong>'.' '.$payment->title.' ('.$payment->description.')';	
	echo '<br />';
	echo CHtml::link(Yep::t('Edit payment method'), array(
			'/paymentmethod/choose', 'order' => true));
echo '</p>';

echo '<hr />';

$this->renderPartial('application.modules.shop.views.shoppingCart.view'); 


echo '<h3>'.Yep::t('Please add additional comments to the order here').'</h3>'; 

echo CHtml::textArea('Order[Comment]',
		@Yii::app()->user->getState('order_comment'), array('style'=>'width:600px; height:100px;padding:10px;'));
		
echo '<br /><br />';

echo '<hr />';
$this->renderPartial(Yii::app()->params->termsView);

?>

<div class="row buttons">
	<?php echo CHtml::submitButton(Yep::t('Confirm Order'),array ('id'=>'next'), array(
                '/order/confirm')); ?>
</div>
<?php echo CHtml::endForm(); ?>