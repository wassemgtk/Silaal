<?php

	class Yep {
		public static function mailNotification ($order) {
			$email = Yii::app()->params->notifyAdminEmail;
			if($email !== null) {
				$appTitle = Yii::app()->name;
				$headers="From: {$title}\r\nReply-To: {do@not-reply.org}";

				mail($email,
						Yep::t('Order #{order_id} has been made in your Store', array(
								'{order_id}' => $order->id)),
						CHtml::link(Yep::t('direct link'), array(
								'/order/view', 'id' => $order->id)));
			}
		}
		
		public static function pricingInfo() {
			Yep::register('js/jquery.tools.min.js');
			Yep::register('css/yep.css');
			Yii::app()->clientScript->registerScript('tooltip',"$('.price_information').tooltip(); ");
			echo '<p class="price_information">';
			echo Yep::t('All prices are including VAT') . '<br />';
			echo Yep::t('All prices excluding shipping costs');
			echo '</p>';
			echo '<div class="tooltip">';
				Yii::app()->controller->renderPartial('/shippingmethod/index'); 
			echo '</div>';

		}

		/* public function getCustomer() {
			$customer = false;
			$customer = Yii::app()->user->getState('customer_id');
				if(!$customer && !Yii::app()->user->isGuest)
					$customer = Customer::model()->find('user_id = :uid', array(
								':uid' => Yii::app()->user->id));

			return $customer;

		}  */

		public static function priceFormat ($price,$currency_id = null) {
			if($currency_id !== null)
				$currency = Currency::model()->findByPk($currency_id);
			if($currency_id !== null and $currency !== null){
				
				$mlp =$currency->multiplier;
				$sign = $currency->sign;
				
				$price = ($price*$mlp);
				$price = sprintf('%.2f', $price);
				$price .= ' '.$sign;
			}else{
				$price = sprintf('%.2f', $price);
				$price .= ' '.Yii::app()->params->currencySymbol;
			}		
			return $price;
		}
		public static function getPaymentMethod() {
			return Yii::app()->user->getState('payment_method');
		}

		public static function getShippingMethod() {
			if($shipping_method = Yii::app()->user->getState('shipping_method'))
				return ShippingMethod::model()->findByPk($shipping_method);
		}


		public static function getCartContent() {
			if(is_string(Yii::app()->user->getState('cart')))
				return json_decode(Yii::app()->user->getState('cart'), true);
			else
				return Yii::app()->user->getState('cart');
		}

		public static function setCartContent($cart) {
			return Yii::app()->user->setState('cart', json_encode($cart));
		}

		public static function getPriceTotal() {
			$price_total = 0;
			$tax_total = 0;
			foreach(Yep::getCartContent() as $product)  {
				$model = Products::model()->findByPk($product['product_id']);
				$price_total += $model->getPrice(@$product['Variations'], @$product['amount']);
				$tax_total += $model->getTaxRate(@$product['Variations'], @$product['amount']);

		}

			if($shipping_method = Yep::getShippingMethod())
				$price_total += $shipping_method->price;

			$price_total = Yep::t('Price total: {total}', array(
						'{total}' => Yep::priceFormat($price_total),
						)); 
			$price_total .= '<br />';
			$price_total .= Yep::t('All prices are including VAT: {vat}', array(
						'{vat}' => Yep::priceFormat($tax_total))) . '<br />';
			$price_total .= Yep::t('All prices excluding shipping costs') . '<br />';

			return $price_total;
		}

		public static function register($file)
		{
			$url = Yii::app()->getAssetManager()->publish(
					Yii::getPathOfAlias('application.assets'));

			$path = $url . '/' . $file;
			if(strpos($file, 'js') !== false)
				return Yii::app()->clientScript->registerScriptFile($path);
			else if(strpos($file, 'css') !== false)
				return Yii::app()->clientScript->registerCssFile($path);

			return $path;
		}

		public static function getCustomer() {
			if(!Yii::app()->user->isGuest) 
				if($customer = Customer::model()->find('user_id = :uid', array(
							':uid' => Yii::app()->user->id))) 
				return $customer;

			if($customer_id = Yii::app()->user->getState('customer_id')) 
				return Customer::model()->findByPk($customer_id);
		}

		public static function t($string, $params = array())
		{
			

			return Yii::t('msg', $string, $params);
		}
		/* set a flash message to display after the request is done */
		public static function setFlash($message) 
		{
			Yii::app()->user->setFlash('yepflash',Yep::t($message));
		}

		public static function hasFlash() 
		{
			return Yii::app()->user->hasFlash('yepflash');
		}

		/* retrieve the flash message again */
		public static function getFlash() {
			if(Yii::app()->user->hasFlash('yepflash')) {
				return Yii::app()->user->getFlash('yepflash');
			}
		}

		public static function renderFlash()
		{
			if(Yii::app()->user->hasFlash('yepflash')) {
				echo '<div class="info">';
				echo Yep::getFlash();
				echo '</div>';
				Yii::app()->clientScript->registerScript('fade',"
						setTimeout(function() { $('.info').fadeOut('slow'); }, 5000);	
						"); 
			}
		}
		public static function renderControlMenu(){
			$folder=dir(Yii::getPathOfAlias('application').'/controllers/');
			$menu = array();
			while($folderEntry=$folder->read())
			{
				$content = basename($folderEntry,'Controller.php');
				$content = basename($content,'.');
				if($content!= '.'  ){
					if($content=='Site'){
						$menu[]= array('label'=>$content, 'url'=>array('/'.strtolower($content).'/index'));
						continue;
					}
					$menu[]= array('label'=>$content, 'url'=>array('/'.strtolower($content).'/admin'));
				}
			}
			$folder->close();
			return $menu;
		}
		public static function out($var=null){
			if($var == null)
				$var = $_POST;
			echo '<pre>';
			print_r($var);
			echo '</pre>';
		}
	}
