<h3> 
<?php echo Yii::t('msg', 'Your Shopping Cart'); ?> 
</h3>
<hr />

<?php 

if(!isset($carts))
	$carts = ShoppingCart::getCartsofOwner();

if(isset($carts)) 
{  
	echo '<ul>';
	foreach($carts as $cart) {
		printf('<li> <b>%s</b> %s %s <b>%s</b> | (%s)</li>', 
			$cart->amount, 
			$cart->Product->unit, 
			Yii::t('msg', 'of'), 
			CHtml::link($cart->Product->title, 
				array('products/view', 'id' => $cart->Product->product_id)
			),
			CHtml::link(Yii::t('msg', 'Remove from Cart'),
	  		array('shoppingcart/delete', 'id' => $cart->cart_id)
	  	)
		) ;
	}
?>
	</ul>
	<hr />

<?php	echo CHtml::link(Yii::t('msg', 'Configure Cart'), array('shoppingcart/admin')); ?>
&nbsp;
<?php	echo CHtml::link(Yii::t('msg', 'Buy this items'), array('order/create')); 

} else
		echo Yii::t('msg', 'Your shopping Cart is empty.');

?>
