<?php
$checkout = yep::getCheckoutContent();
$this->renderPartial('constants');
$this->renderPartial('callerservice');
//Yep::out();exit;
$token = isset($_REQUEST['token'])?$_REQUEST['token']:null;
if(!isset($token)) {
	/* The servername and serverport tells PayPal where the buyer
	 should be directed back to after authorizing payment.
	In this case, its the local webserver that is running this script
	Using the servername and serverport, the return URL is the first
	portion of the URL that buyers will return to after authorizing payment
	*/
	$serverName = $_SERVER['SERVER_NAME'];
	$serverPort = $_SERVER['SERVER_PORT'];
	$url=dirname('http://'.$serverName.':'.$serverPort.$_SERVER['REQUEST_URI']);
	
	if(!isset(Yii::app()->session['currency_code'])){
		Yii::app()->user->setFlash('error', 'Session Error : Orders can not be proceeded');
		$this->redirect(Yii::app()->homeUrl);
	}else{
		$currencyCodeType = Yii::app()->session['currency_code'];
	}
	//$currencyCodeType=$checkout['step6']['currencyCodeType'];
	//$paymentType=$checkout['step6']['paymentType'];
	
	foreach ($_POST as $key=>$value){
		$$key= $_POST[$key];
	}
	foreach ($checkout['step6'] as $key=>$value){
		$$key= $checkout['step6'][$key];
	}
	$PERSONNAME       = isset($checkout['step6']['PERSONNAME'])?$checkout['step6']['PERSONNAME']:$checkout['step2']['firstname'].' '.$checkout['step2']['lastname'];
	$SHIPTOSTREET      = isset($checkout['step6']['SHIPTOSTREET'])?$checkout['step6']['SHIPTOSTREET']:$checkout['step2']['street'];
	$SHIPTOCITY        = isset($checkout['step6']['SHIPTOCITY'])?$checkout['step6']['SHIPTOCITY']:$checkout['step2']['city'];
	$SHIPTOSTATE	   = isset($checkout['step6']['SHIPTOSTATE'])?$checkout['step6']['SHIPTOSTATE']:$checkout['step2']['state'];
	$country = Country::model()->findByPk($checkout['step2']['country_id']);
	$SHIPTOCOUNTRYCODE = isset($checkout['step6']['SHIPTOCOUNTRYCODE'])?$checkout['step6']['SHIPTOCOUNTRYCODE']:$country->iso_code_2;
	$SHIPTOZIP         = isset($checkout['step6']['SHIPTOZIP'])?$checkout['step6']['SHIPTOZIP']:$checkout['step2']['zipcode'];
	
	$siteConfig=SiteConfig::model()->findByAttributes(array("name"=>"CART_PRODUCT_COUNT"));
	$itemamt = 0 ;
	$string = '';
	$inc = 0;
	for($position=0;$position<$siteConfig->value;$position++){
		if(isset($checkout['step6']["L_NAME".$position]) and isset($checkout['step6']["L_AMT".$position]) and isset($checkout['step6']["L_QTY".$position])){
			${"L_NAME".$position}= $checkout['step6']["L_NAME".$position];
			${"L_AMT".$position} = $checkout['step6']["L_AMT".$position];
			${"L_QTY".$position} = $checkout['step6']["L_QTY".$position];
			$itemamt+=${"L_AMT".$position}*${"L_QTY".$position} ;
			
			$string.= "L_NAME".$inc."=".${"L_NAME".$position}."&L_AMT".$inc."=".${"L_AMT".$position}."&L_QTY".$inc."=".${"L_QTY".$position}."&";
			$inc++;
			
		}
		
	}
	/* Construct the parameter string that describes the PayPal payment
	 the varialbes were set in the web form, and the resulting string
	is stored in $nvpstr
	*/
	//$itemamt = $L_QTY0*$L_AMT0+$L_AMT1*$L_QTY1;
	$amt = 5.00+2.00+1.00+$itemamt;
	$maxamt= $amt+25.00;
	$nvpstr="";
	/* The returnURL is the location where buyers return when a payment has been succesfully authorized.
	   The cancelURL is the location buyers are sent to when they hit the cancel button during authorization of payment during the PayPal flow.
	 */

	$returnURL =urlencode($url.'/revieworder?currencyCodeType='.$currencyCodeType.'&paymentType='.$paymentType);
	$cancelURL =urlencode($url."/view" );
	
	/*
	 * Setting up the Shipping address details
	*/
	//$shiptoAddress = "&SHIPTONAME=$PERSONNAME&SHIPTOSTREET=$SHIPTOSTREET&SHIPTOCITY=$SHIPTOCITY&SHIPTOSTATE=$SHIPTOSTATE&SHIPTOCOUNTRYCODE=$SHIPTOCOUNTRYCODE&SHIPTOZIP=$SHIPTOZIP";
	/*  */
	//$currencyCodeType ="USD";
	$paymentType ="Sale";
	$SHIPPINGOPTION ='&L_SHIPPINGOPTIONAMOUNT1=8.00&L_SHIPPINGOPTIONlABEL1=UPS Next Day Air&L_SHIPPINGOPTIONNAME1=UPS Air&L_SHIPPINGOPTIONISDEFAULT1=true&L_SHIPPINGOPTIONAMOUNT0=3.00&L_SHIPPINGOPTIONLABEL0=UPS Ground 7 Days&L_SHIPPINGOPTIONNAME0=Ground&L_SHIPPINGOPTIONISDEFAULT0=false';
	//$item_desc ='&L_NUMBER0=1000&L_DESC0=Size: 8.8-oz&L_NUMBER1=10001&L_DESC1=Size: Two 24-piece boxes&L_ITEMWEIGHTVALUE1=0.5&L_ITEMWEIGHTUNIT1=lbs';
	$item_desc ='';
	$nvpstr="&ADDRESSOVERRIDE=1".$shiptoAddress."&".
		$string."MAXAMT=".(string)$maxamt."&AMT=".(string)$amt."&ITEMAMT=".(string)$itemamt.
		"&CALLBACKTIMEOUT=4".$SHIPPINGOPTION."&INSURANCEAMT=1.00&INSURANCEOPTIONOFFERED=true&CALLBACK=https://www.ppcallback.com/callback.pl&SHIPPINGAMT=8.00&SHIPDISCAMT=-3.00&TAXAMT=2.00".$item_desc."&ReturnUrl=".
		$returnURL."&CANCELURL=".$cancelURL."&CURRENCYCODE=".$currencyCodeType."&PAYMENTACTION=".$paymentType;
	$nvpHeader='';
	$nvpstr = $nvpHeader.$nvpstr;

	/* Make the call to PayPal to set the Express Checkout token
	 If the API call succeded, then redirect the buyer to PayPal
	to begin to authorize payment.  If an error occured, show the
	resulting errors
	*/
	$resArray=hash_call("setexpresscheckout",$nvpstr);
	$_SESSION['reshash']=$resArray;
	//echo '<pre>';print_r($resArray);exit;

	$ack = strtoupper($resArray["ACK"]);

	if($ack=="SUCCESS"){
		// Redirect to paypal.com here
		$token = urldecode($resArray["TOKEN"]);
		$payPalURL = PAYPAL_URL.$token;
		header("Location: ".$payPalURL);
	} else  {
		//Redirecting to APIError.php to display errors.
		//$location = "apierror";
		//header("Location: $location");
		$this->renderPartial("apierror",array('resArray'=>$resArray));
	}
} else {
	/* At this point, the buyer has completed in authorizing payment
	 at PayPal.  The script will now call PayPal with the details
	of the authorization, incuding any shipping information of the
	buyer.  Remember, the authorization is not a completed transaction
	at this state - the buyer still needs an additional step to finalize
	the transaction
	*/

	$token = urlencode($_REQUEST['token']);

	/* Build a second API request to PayPal, using the token as the
	 ID to get the details on the payment authorization
	*/
	$nvpstr="&TOKEN=".$token;
	$nvpHeader='';
	$nvpstr = $nvpHeader.$nvpstr;
	/* Make the API call and store the results in an array.  If the
	 call was a success, show the authorization details, and provide
	an action to complete the payment.  If failed, show the error
	*/
	$resArray=hash_call("getexpresscheckoutdetails",$nvpstr);
	$_SESSION['reshash']=$resArray;
	$ack = strtoupper($resArray["ACK"]);

	if($ack == 'SUCCESS' || $ack == 'SUCCESSWITHWARNING'){
		$this->renderPartial("getexpresscheckoutdetails",$resArray);
	} else  {
		//Redirecting to APIError.php to display errors.
		//$location = "apierror";
		//header("Location: $location");
		$this->renderPartial("apierror",array('resArray'=>$resArray));
	}
}
?>