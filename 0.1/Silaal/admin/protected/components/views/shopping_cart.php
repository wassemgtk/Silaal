<div id="shopping-cart">
<div id="shopping-cart-content">
<?php
if($products) {
	echo '<h3>'.CHtml::link(Yep::t('Shopping cart'), array(
				'/shoppingcart/view')) . '</h3>';

	echo '<table cellpadding="0" cellspacing="0">';	
	foreach($products as $num => $position) { 
		$model = Products::model()->findByPk($position['product_id']);
		printf('<tr>
				<td class="cart-left widget_amount_'.$num.'">%s</td>
				<td class="cart-middle">%s</td>
				<td class="cart-right price_'.$num.'">%s</td></tr>',
				$position['amount'],
				$model->title,
				Yep::priceFormat($position['amount'] * $model->getPrice(@$position['Variations']))
				);
	}

	if($shippingMethod = Yep::getShippingMethod()) {
		printf('<tr>
				<td class="cart-left">1</td>
				<td class="cart-middle">%s</td>
				<td class="cart-right">%s</td></tr>',
				Yep::t('Shipping costs'),
				Yep::priceFormat($shippingMethod->price)
				);
	} 

	printf('<tr>
			<td colspan="3" class="cart-right cart-sum price_total"><strong>%s</strong></td>
			</tr>',
			Yep::getPriceTotal());
	echo '</table>';
}
?>
</div>
<div id="shopping-cart-footer"></div>
</div>
