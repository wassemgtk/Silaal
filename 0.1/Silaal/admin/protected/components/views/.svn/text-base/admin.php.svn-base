<p> <?php echo Yep::t('msg'); ?> </p>
<ul>
<li> <?php echo CHtml::link(Yep::t('Article categories'), array('/category/admin')); ?> </li>
<li> <?php echo CHtml::link(Yep::t('Article specifications'), array('/productspecification/admin')); ?> </li>
<li> <?php echo CHtml::link(Yep::t('Articles'), array('/products/admin')); ?> </li>
<li> <?php echo CHtml::link(Yep::t('Shipping methods'), array('/shippingmethod/admin')); ?> </li>
<li> <?php echo CHtml::link(Yep::t('Payment methods'), array('/paymentmethod/admin')); ?> </li>
<li> <?php echo CHtml::link(Yep::t('Tax'), array('/tax/admin')); ?> </li>
<li> <?php echo CHtml::link(Yep::t('Orders'), array('/order/admin')); ?> </li>

<?php if(isset(Yii::app()->controller->menu)) {
	foreach(Yii::app()->controller->menu as $value) {
		printf('<li>%s</li>', CHtml::link($value['label'], $value['url']));
	}
}
?>
</ul>

