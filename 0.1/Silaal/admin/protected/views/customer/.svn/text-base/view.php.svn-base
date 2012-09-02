<?php
if(!isset($hideEmail)) {
	echo '<h3>'.Yep::t('Customer information').'</h3>';
	
 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email',
	),
)); 
}

if($model->address && !isset($hideAddress)) {
	echo '<h3>'.Yep::t('Address').'</h3>';
 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->address,
	'attributes'=>array(
		'firstname',
		'lastname',
		'street',
		'zipcode',
		'city',
		array('label'=>'country','type'=>'raw','value'=>$model->address->country->name),
	),
)); 

}

echo '<div class="box-delivery-address">';
echo '<h3>'.Yep::t('Delivery address').'</h3>';
 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->deliveryAddress ? $model->deliveryAddress : $model->address,
	'attributes'=>array(
		'firstname',
		'lastname',
		'street',
		'zipcode',
		'city',
		array('label'=>'country','type'=>'raw','value'=>$model->address->country->name),
	),
));
/* echo CHtml::link(Yep::t('Delivery address').' '.Yep::t('Edit'), array(
			'/shippingmethod/choose', 'order' => true)); 
 */echo '</div>';

echo '<div class="box-billing-address">';
echo '<h3>'.Yep::t('Billing address').'</h3>';
 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->billingAddress ? $model->billingAddress : $model->address,
	'attributes'=>array(
		'firstname',
		'lastname',
		'street',
		'zipcode',
		'city',
		array('label'=>'country','type'=>'raw','value'=>$model->address->country->name),
	),
)); 
/* echo CHtml::link(Yep::t('Billing address').' '.Yep::t('Edit'), array(
			'/paymentmethod/choose', 'order' => true));  */
echo '</div>';
echo '<div class="clear"></div>';
?>
