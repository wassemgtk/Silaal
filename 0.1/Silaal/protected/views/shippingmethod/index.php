<?php
$methods = ShippingMethod::model()->findAll();

printf('<h2>%s</h2>', Yep::t('Available shipping methods')); 

if($methods) {
	echo '<table>'; 
	foreach($methods as $method) {
		printf('<tr><td>%s</td><td>%s</td></tr>',
				$method->description,
				Yep::priceFormat($method->price));

	}
	echo '</table>'; 
}
?>
