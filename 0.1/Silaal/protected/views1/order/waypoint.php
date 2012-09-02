<?php
$points = array(
		Yep::t('Customer information'),
		Yep::t('Shipping'),
		Yep::t('Payment'),
		Yep::t('Confirm'),
		Yep::t('Success')
);

$links = array(
		array('/customer/create'),
		array('/shippingmethod/choose'),
		array('/paymentmethod/choose'),
		array('/order/create'));


echo '<div id="waypointarea" class="waypointarea">';
	printf('<span class="waypoint %s">%s</span>',
			$point == 0 ? 'active' : '',
			CHtml::link(Yep::t('Shopping Cart'), array(
						'/shoppingcart/view')));

foreach ($points as $p => $pointText) 
{
	printf('<span class="waypoint%s">%s</span>',
			($point == ++$p) ? ' active' : '',
			$point < ++$p ? $pointText : CHtml::link($pointText, @$links[$p-2])
			);
}
echo '</div>';
?>
