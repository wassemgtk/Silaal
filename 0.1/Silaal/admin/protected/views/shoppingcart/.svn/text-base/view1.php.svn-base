<?php
Yep::register('css/yep.css');

if($this->id == 'shoppingCart')
	$this->renderPartial('/order/waypoint', array('point' => 0));

if(!isset($products)) 
	$products = Yep::getCartContent();

if(!isset($this->breadcrumbs) || ($this->breadcrumbs== array()))
	$this->breadcrumbs = array(
			Yep::t('msg') => array('/products/'),
			Yep::t('Shopping Cart'));
?>

<h2><?php echo Yep::t('Shopping cart'); ?></h2>


<?php
if($products) {
	echo '<table cellpadding="0" cellspacing="0" class="shopping_cart">';
	printf('<tr><th>%s</th><th>%s</th><th>%s</th><th>%s</th><th style="width:60px;">%s</th><th style="width:60px;">%s</th><th>%s</th></tr>',
			Yep::t('Image'),
			Yep::t('Amount'),
			Yep::t('Product'),
			Yep::t('Variation'),
			Yep::t('Price Single'),
			Yep::t('Sum'),
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

			printf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td class="text-right">%s</td><td class="text-right price_'.$position.'">%s</td><td>%s</td></tr>',
					$model->getImage(0, true),
					CHtml::textField('amount_'.$position,
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
							data: $('#amount_".$position."'),
							success: function(result) {
							$('.amount_".$position."').css('background-color', 'lightgreen');
							$('.widget_amount_".$position."').css('background-color', 'lightgreen');
							$('.widget_amount_".$position."').html($('.amount_".$position."').val());
							$('.price_".$position."').html(result);	
							$('.price_total').load('".$this->createUrl(
							'/shoppingcart/getPriceTotal')."');
							},
							error: function() {
							$('#amount_".$position."').css('background-color', 'red');
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

<?php

 if(Yii::app()->controller->id != 'order') {
echo '<div class="buttons">';
echo CHtml::link(Yep::t('Buy additional Products'), array(
			'/products'), array('class'=>'btn-previous'));

echo '<br />';
			
echo CHtml::link(Yep::t('Buy this products'), array(
			'/order/create'), array('class'=>'btn-next')); 
echo '</div>';
}

?>
<div class="clear"></div>

<?php

} else echo Yep::t('Your shopping cart is empty'); ?>

