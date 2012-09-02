<?php 
$this->breadcrumbs = array(Yep::t('Shopping Cart'),array('/shoppingcart/view/'),Yep::t('Checkout'));
?>
<h1><?php echo Yep::t('Checkout');?></h1>
<?php
Yep::renderFlash();
$checkout = Yep::getCheckoutContent();
$this->widget('zii.widgets.jui.CJuiAccordion', array(
		'panels'=>array(
				Yep::t('Step 1: Checkout Options')=>$this->renderPartial('checkout/step1',array('model1'=>$model1),true),
				Yep::t('Step 2: Account & Billing Details')=>$this->renderPartial('checkout/step2',array('model2'=>$model2),true),
				Yep::t('Step 3: Delivery Details')=>$this->renderPartial('checkout/step3',array('model3'=>$model3),true),
				Yep::t('Step 4: Delivery Method')=>$this->renderPartial('checkout/step4',array('model4'=>$model4),true),
				Yep::t('Step 5: Payment Method')=>$this->renderPartial('checkout/step5',array('model5'=>$model5),true),
				Yep::t('Step 6: Confirm Order')=>$this->renderPartial('view',null,true),
		),
		'options'=>array(
				'clearStyle'=>true,
				'animated'=>'easeslide',
				'fillSpace'=>true,
				'active'=>isset($checkout['panel'])? (int)$checkout['panel']:0,
				'collapsable'=>false,
		),
));

