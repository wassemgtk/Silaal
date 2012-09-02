<?php
Yep::register('css/yep.css');

if($this->id == 'shoppingCart')
	$this->renderPartial('/order/waypoint', array('point' => 0));

if(!isset($products)) 
	$products = Yep::getCartContent();

if(!isset($this->breadcrumbs) || ($this->breadcrumbs== array()))
	$this->breadcrumbs = array(
			Yep::t('Products') => array('/products/index'),
			Yep::t('Shopping Cart'));
?>


<?php
//echo CHtml::form("revieworder","POST");
if($this->action->id == 'checkout'){
	$checkout = Yep::getCheckoutContent();
	if((isset($checkout['panel']) and ($checkout['panel']<5) ) and !isset($checkout['step6']) ) return ;
	$form=$this->beginWidget('CActiveForm', array(
			'id'=>'checkout-step5-form',
			'enableAjaxValidation'=>false,
	));
}
?>
<h2><?php echo Yep::t('Shopping Cart Products').':'; ?></h2>
<?php 
if($products) {
	echo '<table cellpadding="0" cellspacing="0" class="shopping_cart">';
	printf('<tr><th>%s</th><th>%s</th><th>%s</th><th>%s</th><th style="width:60px;">%s</th><th style="width:60px;">%s</th><th>%s</th></tr>',
			Yep::t('Image'),
			Yep::t('Quantity'),
			Yep::t('Products'),
			Yep::t(''),
			Yep::t('Price'),
			Yep::t('Total'),
			Yep::t('Actions')
);

	foreach($products as $position => $product) {
		if(@$model = Products::model()->findByPk($product['product_id'])) {
			$variations = '';
			if(isset($product['Variations'])) {
				foreach($product['Variations'] as $specification => $variation) {
					$specification = ProductSpecification::model()->findByPk($specification);
					if($specification->is_user_input)
						$variation = $variation[0];
					else
						$variation = ProductVariation::model()->findByPk($variation);

					$variations .= $specification . ': ' . $variation . '<br />';
				}
			}
 			echo "<input type='hidden' name ='L_NAME".$position."' value='".$model->title."'>";
 			echo "<input type='hidden' name ='L_AMT".$position."' value='".$model->getPrice(@$product['Variations'])."'>";
 			
 			printf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td class="text-right">%s</td><td class="text-right price_'.$position.'">%s</td><td>%s</td></tr>',
					$model->getImage(0, true),
					CHtml::textField('L_QTY'.$position,
						$product['amount'], array(
							'size' => 4,
							'class' => 'amount_'.$position,
							)
						),
					$model->title,
					$variations,
					Yep::priceFormat($model->getPrice(@$product['Variations'])),
					Yep::priceFormat($model->getPrice(@$product['Variations'], @$product['amount'])),
					CHtml::link(Yep::t('Remove'), array(
							'/shoppingcart/delete',
							'id' => $position), array(
								'confirm' => Yep::t('Are you sure?')))
					);

			Yii::app()->clientScript->registerScript('amount_'.$position,"
					$('.amount_".$position."').keyup(function() {
						$.ajax({
							url:'".$this->createUrl('/shoppingcart/updateAmount')."',
							data: $('#L_QTY".$position."'),
							success: function(result) {
							$('.amount_".$position."').css('background-color', 'lightgreen');
							$('.widget_amount_".$position."').css('background-color', 'lightgreen');
							$('.widget_amount_".$position."').html($('.amount_".$position."').val());
							$('.price_".$position."').html(result);	
							$('.price_total').load('".$this->createUrl(
							'/shoppingcart/getPriceTotal')."');
							},
							error: function() {
							$('#L_QTY".$position."').css('background-color', 'red');
							},

							});
				});
					");
			}
}
	if($shippingMethod = Yep::getShippingMethod()) {
		printf('<tr>
				<td></td>
				<td>1</td>
				<td>%s</td>
				<td></td>
				<td class="text-right">%s</td>
				<td class="text-right">%s</td>
				<td>%s</td></tr>',
				Yep::t('Shipping costs'),
				Yep::priceFormat($shippingMethod->price),
				Yep::priceFormat($shippingMethod->price),
				CHtml::link(Yep::t('edit'), array('/shippingmethod/choose'))
				);
	}
echo '<tr>
<td class="text-right no-border" colspan="6">
<p class="price_total">'.Yep::getPriceTotal().'</p></td>
<td class="no-border"></td></tr>';
echo '</table>';

?>	   
<input type="hidden" name ="currencyCodeType" value="USD" />
<input type="hidden" name ="paymentType" value="paypal" />         
<!-- <input type="image" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" /> -->
<br><br>

<?php

	if($this->action->id == 'view') {
		
		echo '<div class="check-nav">';
		echo CHtml::link(Yep::t('Buy Additional Products'), array(
					'/products'), array('class'=>'btn-previous'));
		echo CHtml::link(Yep::t('checkout'), array(
					'/shoppingcart/checkout'), array('class'=>'btn-previous','style'=>"float:right;"));
		echo '</div><br />';
	}else if($this->action->id == 'checkout'){
		$checkout = Yep::getCheckoutContent();
		
		if(!empty($checkout))
		echo '<table>';
		$checkout = yep::getCheckoutContent();
		if(!empty($checkout)){
		 	if(!empty($checkout['step4']['delivery_method'])){
				$delivery_method = ShippingMethod::model()->findByPk($checkout['step4']['delivery_method']);
				if(!is_null($delivery_method))
		 		echo '<tr ><td>'.Yep::t('Delivery Method').'</td><td>'.Yep::t($delivery_method->title).'</td></tr>';
		 	}
		 	if(!empty($checkout['step5']['payment_method'])){
		 		$payment_method = PaymentMethod::model()->findByPk($checkout['step5']['payment_method']);
		 		if(!is_null($payment_method))
		 			echo '<tr ><td>'.Yep::t('Payment Method').'</td><td>'.Yep::t($payment_method->title).'</td></tr>';
		 	}
		}
		
		echo '</table>';
		/* $form=$this->beginWidget('CActiveForm', array(
				'id'=>'checkout-step5-form',
				'enableAjaxValidation'=>false,
		)); */
		echo '<input type="hidden" name="step" value = "6">';
		echo CHtml::submitButton(Yep::t('Confirm Order'));  
		$this->endWidget(); 
	}
		
}else{
	echo Yep::t('Your shopping cart is empty');
}?>

