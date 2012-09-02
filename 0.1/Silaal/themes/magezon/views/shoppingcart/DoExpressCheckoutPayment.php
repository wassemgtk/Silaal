<?php
$this->renderPartial('callerservice');
//require_once 'callerservice.php';

ini_set('session.bug_compat_42',0);
ini_set('session.bug_compat_warn',0);

/* Gather the information to make the final call to
   finalize the PayPal payment.  The variable nvpstr
   holds the name value pairs
   */
$token =urlencode( $_SESSION['token']);
$paymentAmount =urlencode ($_SESSION['TotalAmount']);
$paymentType = urlencode($_SESSION['paymentType']);
$currCodeType = urlencode($_SESSION['currCodeType']);
$payerID = urlencode($_SESSION['payer_id']);
$serverName = urlencode($_SERVER['SERVER_NAME']);
$paymentType ="Sale";
$currCodeType='USD';
$nvpstr='&TOKEN='.$token.'&PAYERID='.$payerID.'&PAYMENTACTION='.$paymentType.'&AMT='.$paymentAmount.'&CURRENCYCODE='.$currCodeType.'&IPADDRESS='.$serverName ;



 /* Make the call to PayPal to finalize payment
    If an error occured, show the resulting errors
    */
$resArray=hash_call("DoExpressCheckoutPayment",$nvpstr);

/* Display the API response back to the browser.
   If the response from PayPal was a success, display the response parameters'
   If the response was an error, display the errors received using APIError.php.
   */
$ack = strtoupper($resArray["ACK"]);


if($ack != 'SUCCESS' && $ack != 'SUCCESSWITHWARNING'){
//if(false){
	$_SESSION['reshash']=$resArray;
	$location = "apierror";
		 header("Location: $location");
}
else{
	/* $dump= Dump::model()->findAll();
	//echo '<pre>';
	
	
	foreach($dump as $row){
		$middle = unserialize($row->middle);
		$resArray= unserialize($row->last);
		break;
	} */
		
	//print_r($midle);print_r($resArray);
	               
	if(!empty($midle) || !empty($resArray)){
		
		$dump = new Dump();
		$dump->middle = serialize($middle);
		$dump->last = serialize($resArray);
		$dump->save();
		
		$address = new Address();
		$address->firstname = $middle['FIRSTNAME'];  
		$address->lastname = $middle['LASTNAME'];
		$address->street = $middle['SHIPTOSTREET'];
		$address->zipcode = $middle['SHIPTOZIP'];
		$address->city = $middle['SHIPTOCITY'];
		$address->state = $middle['SHIPTOSTATE'];
		$country = Country::model()->findByAttributes(array('iso_code_2'=>$middle['SHIPTOCOUNTRYCODE']));
		$address->country_id = $country->country_id;
		
		if($address->save()){
			Yii::app()->user->setFlash('success', "Address is saved.");
			$customer = new Customer();
			if(!Yii::app()->user->isGuest)
				$customer->user_id = Yii::app()->user->getId();
			
			$add = $address->id;
			$biling_address = $address->id;
			$delivery_address = $address->id;
			
			$customer->address_id = $add;
			$customer->delivery_address_id = $delivery_address;
			$customer->billing_address_id = $biling_address;
			
			$customer->email = $middle['EMAIL'];
			if($customer->save()){
				Yii::app()->user->setFlash('success', "Customer record is saved.");
				$order = new Order();
				$order->customer_id = $customer->customer_id;
				$order->delivery_address_id =$delivery_address;
				$order->billing_address_id = $biling_address;
				$order->ordering_date = date("Y-m-d H:i:s");
				//$order->ordering_done = '0';
				//$order->ordering_confirmed = '0';		
				$order->payment_method = 'Paypal Balance';	
				$order->shipping_method = $middle['SHIPPINGOPTIONNAME'];
				$order->comment = '';
				if($order->save()){
					Yii::app()->user->setFlash('success', "Your Order is  saved.");
					$message = new YiiMailMessage;
					$message->setBody("Dear $address->firstname $address->lastname,<br>
							Your order is under process.<br>
							Please be in touch.<br>
							Regards<br>
							".Yii::app()->name." Team");
					$message->subject = 'Your order is under process.';
					$message->addTo(Yii::app()->params['notifyAdminEmail'],$middle['EMAIL']);
					$message->from = Yii::app()->params['adminEmail'];
					Yii::app()->mail->send($message);
					
					Yii::app()->user->setFlash("success","
							Thank you for your payment.<br>
							Your order is under process.<br>
							Please check your mailbox.");
					$this->redirect(Yii::app()->homeUrl);
				}else{
					Yii::app()->user->setFlash('error', "Your Order is not saved.");
					$this->redirect(Yii::app()->homeUrl);
				}
			}else{
				Yii::app()->user->setFlash('error', "Customer record is not saved.");
				$this->redirect(Yii::app()->homeUrl);
			}
		}else{
			Yii::app()->user->setFlash('error', "Address is not saved.");
			$this->redirect(Yii::app()->homeUrl);
		}
		$this->redirect(Yii::app()->homeUrl);
	}
	$this->redirect(Yii::app()->homeUrl);
}?>
    