<?php

class Yep
{
	public static function mailNotification ($order) {
		$email = Yii::app()->params->notifyAdminEmail;
		if($email !== null) {
			$appTitle = Yii::app()->name;
			$headers="From: {$title}\r\nReply-To: {do@not-reply.org}";

			mail($email,
					Yep::t('Order #{order_id} has been made in your store', array(
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

	public function getCustomer() {
		$customer = false;
		$customer = Yii::app()->user->getState('customer_id');
			if(!$customer && !Yii::app()->user->isGuest)
				$customer = Customer::model()->find('user_id = :uid', array(
							':uid' => Yii::app()->user->id));

		return $customer;

	}

	public static function priceFormat ($price) {
		$mlp = isset(Yii::app()->session['currency_multiplier']) ? Yii::app()->session['currency_multiplier'] : 1;
		$sign = isset(Yii::app()->session['currency_sign']) ? Yii::app()->session['currency_sign'] :'$';
		$price = ($price*$mlp);
		$price = sprintf('%.2f', $price);
		if(Yii::app()->language == 'de')
			$price = str_replace('.', ',', $price);
		$price .= ' '.$sign;
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

		$price_total = Yep::t('Price total').Yep::t(': {total}', array(
					'{total}' => Yep::priceFormat($price_total),
					)); 
		$price_total .= '<br />';
		$price_total .= Yep::t('All prices are including VAT').Yep::t(': {vat}', array(
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

	/* public static function getCustomer() {
		if(!Yii::app()->user->isGuest) 
			if($customer = Customer::model()->find('user_id = :uid', array(
						':uid' => Yii::app()->user->id))) 
			return $customer;

		if($customer_id = Yii::app()->user->getState('customer_id')) 
			return Customer::model()->findByPk($customer_id);
	} */

	public static function t($string, $params = array())
	{
		return Yii::t('msg', ucfirst(strtolower(trim($string))), $params);
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
	/**
	 * @return string renders appropriate flash Message inside the system.
	 */
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
	/**
	 * @return string Renders Language dropdown list.
	 */
	public static function renderLanguage(){
		
		$data = Language::model()->findAll(new CDbCriteria(array("condition"=>"status='Active'")));
		if(count($data)>0){
			$languageContent = '<form  method="post">
			&nbsp;&nbsp;&nbsp;&nbsp;<select name="country_code" onChange="this.form.submit()">
			';
			foreach($data as $row){
				if(strtolower($row['code']) == Yii::app()->language || (strtolower($row['code']) == 'en' and Yii::app()->language=='en_us'))
				$languageContent.= '<option selected="selected" value="'.$row['code'].'">'.$row['name'].'</option>';
				else
				$languageContent.='<option value="'.$row['code'].'">'.$row['name'].'</option>';
			}
			$languageContent.= '</select></form>'; 
		 }
		echo $languageContent;
	}
	/**
	 * @return string Renders currency dropdown list .
	 */
	public static function renderCurrency(){
		$currencyContent='';
		$currency = Currency::model()->findAll(new CDbCriteria(array("condition"=>"status='Active'")));
		if(count($currency)>0){
			$currencyContent.='<form  method="post">
			<select name="currency_code" onChange="this.form.submit()">';
			foreach($currency as $row){
				if($row->id == Yii::app()->session['currency_code'])
				$currencyContent.= '<option selected="selected" value="'.$row['id'].'">'.$row['name'].'('.$row['sign'].')'.'</option>';
				else
				$currencyContent.= '<option value="'.$row['id'].'">'.$row['name'].'('.$row['sign'].')'.'</option>';
				}
			$currencyContent.='</select></form>';
		}
		echo $currencyContent;
		
	}
	/**
	 * 
	 * @return array customized menu for the system.
	 */
	public static function renderMenu(){
			$items = array();
			$items[] = array('label'=>Yep::t('Home'), 'url'=>array('/products/index'));
			$data0 = Category::model()->findAllByAttributes(array('parent_id'=>0));
			foreach( $data0 as $category){
				$data1 = Category::model()->findAllByAttributes(array('parent_id'=>$category->category_id));
				$items1 = array();
				if(!empty($data1)){
					foreach($data1 as $cat)
					{
						$cat_des = CategoryDescription::model()->findByAttributes(array('category_id'=>$cat->category_id,'language_id'=>Yii::app()->user->getstate('languageId')));
						
						if($cat->title or $cat->category_id)
							$items1[] = array(
									'label' =>is_null($cat_des->title)?$cat->title:$cat_des->title,
									'url' => array('/category/view', 'id' => $cat->category_id)
							);
					}
					$cat_des0 = CategoryDescription::model()->findByAttributes(array('category_id'=>$category->category_id,'language_id'=>Yii::app()->user->getstate('languageId')));
					$items[] = array(
							'label' =>is_null($cat_des0->title)?$category->title:$cat_des0->title,
							'url' => array('/category/view', 'id' => $category->category_id),
							'items'=>$items1,
					);
				}else{
					$cat_des0 = CategoryDescription::model()->findByAttributes(array('category_id'=>$category->category_id,'language_id'=>Yii::app()->user->getstate('languageId')));
					$items[] = array(
							'label' =>is_null($cat_des0->title)?$category->title:$cat_des0->title,
							'url' => array('/category/view', 'id' => $category->category_id)
					);
				}
			
			}
			/* $items[] = array('label'=>'Logout('.Yii::app()->user->name.')', 'url'=>array('/site/logout'),'visible'=>!Yii::app()->user->isGuest);
			$items[] = array('label'=>'Login', 'url'=>array('/site/login'),'visible'=>Yii::app()->user->isGuest); */
			
			return $items;
		}
		public static function renderMenu1(){
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
	public static function renderFeaturImage(){
		$data = Image::model()->findAllByAttributes(array('featured'=>'1'));
		$renderContent = '<div id="slider" class="border_radius8 append-bottom"><ul>';
		foreach ($data as $row){
			$renderContent.='<li><img src="'.Yii::app()->homeUrl.'productimages/'.$row->filename.'" alt="'.$row->title.'" /></li>';
		}
		$renderContent.= '</ul></div>';
		echo  $renderContent;
	}	
	public static function renderLinks($name){
		$data = SiteConfig::model()->findByAttributes(array("name"=>$name));
		if(count($data)){
			echo  $data->value;
		}else {
			echo  '#';
		}
	 
	}
	
	public static function getCheckoutContent() {
		if(is_string(Yii::app()->user->getState('checkout')))
			return json_decode(Yii::app()->user->getState('checkout'), true);
		else
			return Yii::app()->user->getState('checkout');
	}
	
	public static function setCheckoutContent($checkout) {
		return Yii::app()->user->setState('checkout', json_encode($checkout));
	}
	public static function out($var=null){
		if($var == null)
			$var = $_POST;
		echo '<pre>';
		print_r($var);
		echo '</pre>';
	}
}
