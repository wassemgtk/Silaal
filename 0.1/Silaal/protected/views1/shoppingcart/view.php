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

<h2><?php echo Yep::t('Shopping Cart Products:'); ?></h2>
<?php
echo CHtml::form("revieworder","POST");
if($products) {
	echo '<table cellpadding="0" cellspacing="0" class="shopping_cart">';
	printf('<tr><th>%s</th><th>%s</th><th>%s</th><th>%s</th><th style="width:60px;">%s</th><th style="width:60px;">%s</th><th>%s</th></tr>',
			Yep::t('Product Image'),
			Yep::t('Quantity'),
			Yep::t('Product Name'),
			Yep::t('Variation'),
			Yep::t('Price(Single)'),
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

if(!Yii::app()->user->isGuest){
	$user=User::model()->findByPk(Yii::app()->user->getId());

?>
 <table>	
		<tr>
	    	<td class="field">
	    		Ship To:
	    	</td>
	    	<td>&nbsp;</td>
	    </tr>	
	    	
        <tr>
			<td class="field">
				 Name:</td>
			<td>
				<input type="text" size="30" maxlength="32" name="PERSONNAME" value="<?php echo $user->firstname." ".$user->lastname; ?>" /></td>
		</tr>
		<tr>
			<td class="field">
				Street:</td>
			<td>
				<input type="text" size="30" maxlength="32" name="SHIPTOSTREET" value="<?php echo $user->address->street;?>" /></td>
		</tr>
		<tr>
			<td class="field">
				City:</td>
			<td>
				<input type="text" size="30" maxlength="32" name="SHIPTOCITY" value="<?php echo $user->address->city;?>" /></td>
		</tr>
		<tr>
			<td class="field">
				State:</td>
			<td>
				<input type="text" size="30" maxlength="32" name="SHIPTOSTATE" value="<?php echo $user->address->state;?>" /></td>
		</tr>
		<tr>
			<td class="field">
				Country:</td>
			<td>
				<?php $country = Country::model()->findAll();?>
				<select name="SHIPTOCOUNTRYCODE" >
				<?php 
				foreach($country as $cnt){
					if($cnt->iso_code_2 == 'US')
					echo "<option value='".$cnt->iso_code_2."' selected = 'selected'>".$cnt->name."</option>";
					else
					echo "<option value='".$cnt->iso_code_2."'>".$cnt->name."</option>";					
				}
				?>
				</select>
				</td>
		</tr>
		<tr>
			<td class="field">
				Zip Code:</td>
			<td>
				<input type="text" size="30" maxlength="32" name="SHIPTOZIP" value="<?php echo $user->address->zipcode;?>" /></td>
		</tr>
	</table> 
	<?php }?> 	            
<input type="image" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" />
<br><br>
<?php
	if(Yii::app()->controller->id != 'order') {
	echo '<div class="buttons">';
	echo CHtml::link(Yep::t('Buy Additional Products'), array(
				'/products'), array('class'=>'btn-previous'));
	echo '</div><br />';
	}
} else echo Yep::t('Your shopping cart is empty'); ?>

