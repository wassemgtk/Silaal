<?php
/********************************************************
getexpresscheckoutdetails.php

This functionality is called after the buyer returns from
PayPal and has authorized the payment.

Displays the payer details returned by the
getexpresscheckoutdetails response and calls
DoExpressCheckoutPayment.php to complete the payment
authorization.

Called by ReviewOrder.php.

Calls DoExpressCheckoutPayment.php and APIError.php.

********************************************************/

//session_start();

/* Collect the necessary information to complete the
   authorization for the PayPal payment
   */

$_SESSION['token']=$_REQUEST['token'];
$_SESSION['payer_id'] = $_REQUEST['PayerID'];

$_SESSION['paymentAmount']=$_REQUEST['paymentAmount'];
$_SESSION['currCodeType']=$_REQUEST['currencyCodeType'];
$_SESSION['paymentType']=$_REQUEST['paymentType'];

$resArray=$_SESSION['reshash'];
$_SESSION['TotalAmount']= $resArray['AMT'] + $resArray['SHIPDISCAMT'];

/* Display the  API response back to the browser .
   If the response from PayPal was a success, display the response parameters
   */

?>
<center>
	<font size=2 color=black face=Verdana><b>Order Review</b><br><b>Please be confirm !</b></font>
	<br><br></center>
	<form action="DoExpressCheckoutPayment" method="POST">
	 <center>
           <table >
           <!--  <tr>
                <td><b>Order Total:</b></td>
                <td>
                  <?php // echo $_REQUEST['currencyCodeType'];   echo $resArray['AMT'] + $resArray['SHIPDISCAMT'] ?></td>
            </tr> -->
	 		<table class="api" >
		        	<?php 
	    		foreach($resArray as $key => $value) {
	    			if($key=='EMAIL'||substr($key, 0,6) == 'SHIPTO')
	    			//echo "<tr><td> <b>$key:</b></td><td><input type='text' name='$key' value='$value'></td>";
	    			echo "<tr><td> <b>$key:</b></td><td>$value</td>";
	    			else
	    			echo "<input type='hidden' name='$key' value='$value'>";
	    			}	
	       			?>
	 	 	</table>
          
            <tr>
                <td class="thinfield">
                     <!--<input type="image" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" />  -->
                      <input type="submit" name="submit" value ="Submit" />
                     <input type="button" name = 'cancel' value = 'Cancel' onclick="window.location = '<?php echo Yii::app()->homeUrl;?>';">
                </td>
            </tr>
        </table>
    </center>
    </form>
