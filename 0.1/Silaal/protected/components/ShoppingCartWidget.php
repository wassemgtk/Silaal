<?php

Yii::import('zii.widgets.CPortlet');

class ShoppingCartWidget extends CPortlet {
	public function	init() {
		if(!Yep::getCartContent())			
			return false;
		return parent::init();
	}

	public function	run() {
		if(!Yep::getCartContent())
			return false;

		$this->render('shopping_cart', array('products' => Yep::getCartContent()));
		return parent::run();
	}

}
?>
