<?php
class ShoppingCartController extends Controller
{	
	public $layout='//layouts/column2';
	public function actionView()
	{
		$cart = Yep::getCartContent();
		$this->render('view',array(
						'products'=>$cart
						));
	}

	public function actionGetPriceTotal() {
		echo Yep::getPriceTotal();
	}

	public function actionUpdateAmount() {

		$cart = Yep::getCartContent();

		foreach($_GET as $key => $value) {

			if(substr($key, 0, 5) == 'L_QTY') {

				if($value == '')

					return true;

				if (!is_numeric($value) || $value <= 0)

					throw new CException(Yep::t('Wrong amount'));

				$position = explode('_QTY', $key);

				$position = $position[1];

				if(isset($cart[$position]['amount']))

					$cart[$position]['amount'] = $value;

					$product = Products::model()->findByPk($cart[$position]['product_id']);

					echo Yep::priceFormat(

							@$product->getPrice($cart[$position]['Variations'], $value));

					return Yep::setCartContent($cart);

			}	

		}

}
	// Add a new product to the shopping cart

	public function actionCreate()

	{

		if(!is_numeric($_POST['amount']) || $_POST['amount'] <= 0) {

			Yep::setFlash(Yep::t('Illegal amount given'));

			$this->redirect(array( 

							'/products/view', 'id' => $_POST['product_id']));
		}

		if(isset($_POST['Variations']))

			foreach($_POST['Variations'] as $key => $variation) {

				$specification = ProductSpecification::model()->findByPk($key);

				if($specification->required && $variation[0] == '') {

					Yep::setFlash(Yep::t('Please select a {specification}', array(
									'{specification}' => $specification->title)));
					$this->redirect(array(
								'/products/view', 'id' => $_POST['product_id']));
				}
		}
		$cart = Yep::getCartContent();
		// remove potential clutter

		if(isset($_POST['yt0']))

			unset($_POST['yt0']);

		if(isset($_POST['yt1']))

			unset($_POST['yt1']);

		$added = false;
		if(!empty($cart)){
			foreach($cart as $key=>$value){
				if($cart[$key]['product_id']==$_POST['product_id']){
					$cart[$key]['amount']+=$_POST['amount'];
					$added=true;
					break;
				}
			}
		}
		if(!$added and $_POST['product_id']){
			$cart[]=$_POST;
		}
		//Yep::setCartContent('');exit;
		//echo '<pre>';print_r($_POST);exit;
		Yep::setCartcontent($cart);
		Yep::setFlash(Yep::t('The product has been added to the shopping cart'));
		$this->redirect(array('/products/index'));
	}
	public function actionDelete($id)
	{
		$id = (int) $id;
		$cart = json_decode(Yii::app()->user->getState('cart'), true);
		unset($cart[$id]);
		Yii::app()->user->setState('cart', json_encode($cart));
			$this->redirect(array('/shoppingcart/view'));

	}
	public function actionIndex()

	{
		if(isset($_SESSION['cartowner'])) {
			$carts = ShoppingCart::model()->findAll('cartowner = :cartowner', array(':cartowner' => $_SESSION['cartowner']));
			$this->render('index',array( 'carts'=>$carts,));
		} 
	}
	public function actionAdmin()
	{
		$model=new ShoppingCart('search');
		if(isset($_GET['ShoppingCart']))
			$model->attributes=$_GET['ShoppingCart'];
			$model->cartowner = Yii::app()->User->getState('cartowner');

		$this->render('admin',array(

			'model'=>$model,
		));
	}
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=ShoppingCart::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,Yep::t('The requested page does not exist.'));
		}
		return $this->_model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='shopping cart-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionReviewOrder(){
		/* if(Yii::app()->user->isGuest)
			$this->redirect(array("site/login")); */
		$this->render("revieworder");
	}
	public function actionApierror(){
		$this->render("apierror");
	}
	public function actionDoExpressCheckoutPayment(){
		$middle = $_POST;
		$_SESSION['customer_email']=$_POST['EMAIL'];
		$this->render("DoExpressCheckoutPayment", array('middle'=>$middle));
		Yep::setCartContent(array());
	}
	public function actionCheckout(){
		
		
		$cart = Yep::getCartContent();
		if(empty($cart)){
			$this->redirect(array('/shoppingcart/view'));
		}
		$checkout = Yep::getCheckoutContent();
		if(empty($_POST)){
			$checkout = array();
			if(Yii::app()->user->isGuest)
				$checkout['panel'] = 0;
			else{
				$checkout['step1'] = array('account'=>'1');
				$checkout['panel']=1;
			}
			Yep::setCheckoutContent($checkout);
		}
		$flag=false;
		for($i=1;$i<=5;$i++){
			${'model'.$i}= new Checkout('step'.$i);
			if(!Yii::app()->user->isGuest and !isset($checkout['step2'],$checkout['step3'])){
				if($i==2 ){
					$user_data = User::model()->findByPk(Yii::app()->user->getId());
					foreach($user_data->address->attributes as $key=>$value){
							if($key != 'id')
								$checkout['step'.$i][$key]=$user_data->address->$key;
						}
					$checkout['panel']=$i;
				}
				if($i == 3){
					$user_data = User::model()->findByPk(Yii::app()->user->getId());
					foreach($user_data->address->attributes as $key=>$value){
						if($key.'1' != 'id1')
							$checkout['step'.$i][$key.'1']=$user_data->address->$key;
					}
					$checkout['panel']=$i;
				}
			}
			if(isset($_POST['Checkout']) and !isset($checkout['step'.$i]))
			{
				${'model'.$i}->attributes=$_POST['Checkout'];
				if($checkout['panel']== ($i-1) and $flag==false){
					${'valid'.$i}=${'model'.$i}->validate();
					if(${'valid'.$i})
					{
						$checkout['panel'] = $i;
						$checkout['step'.$i]= $_POST['Checkout'];
						Yep::setCheckoutContent($checkout);
						$flag = true;
					}
				}
			}else if((isset($_POST['step']) and $_POST['step']== $i) and isset($checkout['step'.$i])) {
				${'model'.$i}->attributes=$_POST['Checkout'];
				${'valid'.$i}=${'model'.$i}->validate();
				if(${'valid'.$i})
				{
					$checkout['panel'] = $i;
					$checkout['step'.$i]= $_POST['Checkout'];
					Yep::setCheckoutContent($checkout);
				}
			}else if(isset($checkout['step'.$i])){
				
				foreach($checkout['step'.$i] as $key => $value)
					${'model'.$i}->$key = $checkout['step'.$i][$key];
				${'valid'.$i}=${'model'.$i}->validate();
			}
		}
		if(isset($_POST['step'])){
			switch ($_POST['step']){
				case 2:	
					$checkout['step3']=array();
					foreach($checkout['step2'] as $key=>$value){
						if($key !='email'){
							$checkout['step3'][$key.'1']=$value;
							$model3->{$key.'1'} = $value;
						}
					}
					$valid3=$model3->validate();
					if($valid3)	
					$checkout['panel']=3;
					break;
				case 1:
					
					if($_POST['Checkout']['account']==1 and Yii::app()->user->isGuest)
						$this->redirect(array('/site/login'));
					break;	
				case 6:
					//Yep::out($_POST);
					$checkout['step6']=$_POST;
					Yep::setCheckoutContent($checkout);
					$checkout=Yep::getCheckoutContent();
					//exit;
					/* if($checkout['step5']['payment_method']==5){
						$this->redirect(array('shoppingcart/revieworder'));
					}else exit; */
					// order processing.
					$payment_address = new Address();
					$shipping_address = new Address();
					foreach($checkout['step2'] as $key=>$value){
						if($key != 'email'){
							$shipping_address->$key = $value;
							$payment_address->{$key}= $checkout['step3'][$key.'1'];
						}
						
					}
					/* Yep::out($shipping_address->attributes);
					Yep::out($payment_address->attributes); */
					if($shipping_address->save(false)and $payment_address->save(false)){
						$customer = new Customer();
						if(!Yii::app()->user->isGuest){
							$customer->user_id = Yii::app()->user->getId();
							$customer->email = $checkout['step2']['email'];
							$user_data = User::model()->findByPk(Yii::app()->user->getId());
							if($user_data !==null){
							$customer->address_id =  $user_data->address_id;
							//$customer->email= $user_data->email;
							}
						}
						$customer->delivery_address_id = $shipping_address->id;
						$customer->billing_address_id = $payment_address->id;
						if($customer->save(false)){
							$order = new Order();
							$order->customer_id =$customer->customer_id;
							$order->delivery_address_id =$shipping_address->id;
							$order->billing_address_id = $payment_address->id;
							
							$lang_code = is_null(Yii::app()->user->getState('lang'))?'':Yii::app()->user->getState('lang');
							
							
							$langs = Language::model()->findAll();
							$eng = '';
							$req=null;
							foreach($langs as $lns){
								if(strtolower($lns->name)=='english' || strtolower($lns->code)=='en')
									$eng= $lns->id;
								if(Yii::app()->language == strtolower($lns->code))
									$req = $lns->id;
							}
							$order->language_id = isset($req)?$req:$eng;
							if(!isset(Yii::app()->session['currency_code'])){
								Yii::app()->user->setFlash('error', Yep::t('Session Error : Orders can not be proceeded'));
								$this->redirect(Yii::app()->homeUrl);
							}else{ 
							$order->currency_id = Yii::app()->session['currency_code'];
							$order->currency_value = Yii::app()->session['currency_multiplier'];
							}
							
							$order->ordering_date = date('Y-m-d H:i:s');
							$order->ordering_done = 0;
							$order->ordering_confirmed = 0;
							$order->payment_method = $checkout['step5']['payment_method'];
							$order->shipping_method = $checkout['step4']['delivery_method'];
							$order->comment = 
									'Payment Method Comment:'.$checkout['step5']['payment_comment'].",\n".
									'Delivery Method Comment:'.$checkout['step4']['delivery_comment'];
							if($order->save(false)){
								$checkout['order_id']=$order->order_id;
								Yep::setCheckoutContent($checkout);
								$checkout=Yep::getCheckoutContent();
								
								$cart= Yep::getCartContent();
								if(!empty($cart)){
									$item_count = count($cart);
									$item_save =0;
									foreach($cart as $item){
										
										$order_position = new OrderPosition();
										$order_position->order_id = $order->order_id;
										$order_position->product_id = $item['product_id'];
										$order_position->amount = $item['amount'];
										$order_position->specifications = '';
										if($order_position->save(false)){
											$item_save++;
										}else{
											Yii::app()->user->setFlash('error', Yep::t('Database Error 4: Orders can not be proceeded'));
											$this->redirect(Yii::app()->homeUrl);
										}
									}
								
									if($item_count == $item_save){
										// go to paypal orperation.
										//emptize cart
										
										
										
										$message = new YiiMailMessage;
										$message->setBody("Dear $payment_address->firstname $payment_address->lastname,<br>
												Your order is under process.<br>
												Please be in touch.<br>
												Regards<br>
												".Yii::app()->name." Team");
										$message->subject = 'Your order is under process.';
										$message->addTo(Yii::app()->params['notifyAdminEmail'],$customer->email);
										$message->from = Yii::app()->params['adminEmail'];
										Yii::app()->mail->send($message);
								
										
										// paypal redirection
										
										if($checkout['step5']['payment_method']==5){
											// forward to PAYPAL.
											$this->redirect(array('shoppingcart/revieworder'));
										}
										Yep::setCartContent(array());
										Yii::app()->user->setFlash("success",Yep::t("Thank you for your payment. Your order is under process. Please check your mailbox."));
										$this->redirect(array('shoppingcart/view'));
									}else{
										Yii::app()->user->setFlash('error', Yep::t('Database Error 5: Orders can not be proceeded'));
										$this->redirect(array('shoppingcart/view'));
									}
								}
							}else{
								Yii::app()->user->setFlash('error', Yep::t('Database Error 3: Orders can not be proceeded'));
								$this->redirect(array('shoppingcart/view'));
							}
						}else{
							Yii::app()->user->setFlash('error', Yep::t('Database Error 2: Orders can not be proceeded'));
							$this->redirect(array('shoppingcart/view'));
						}
					}else{
						Yii::app()->user->setFlash('error', Yep::t('Database Error 1: Orders can not be proceeded'));
						$this->redirect(array('shoppingcart/view'));
					}
					
					
					break;
			}
		}
		for($i=1;$i<=5;$i++){
			if((isset(${'valid'.$i}) and ${'valid'.$i} == false)){
				$checkout['panel']=$i-1;
				break;
			}
		}
		Yep::setCheckoutContent($checkout);
		$this->render('checkout',array(
				'model1'=>$model1,
				'model2'=>$model2,
				'model3'=>$model3,
				'model4'=>$model4,
				'model5'=>$model5,
		));
		
		//Yep::out(Yep::getCheckoutContent());Yep::out(Yep::getCartContent());
		
	}
}

