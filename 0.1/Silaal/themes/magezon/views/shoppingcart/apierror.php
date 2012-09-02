<?php
$resArray=$_SESSION['reshash'];
$this->pageTitle ='PayPal API Error'; 
?>
<center>

<table width="280">
<tr>
		<td colspan="2" class="header">The PayPal API has returned an error!</td>
	</tr>

<?php  //it will print if any URL errors 
	if(isset($_SESSION['curl_error_no'])) { 
			$errorCode= $_SESSION['curl_error_no'] ;
			$errorMessage=$_SESSION['curl_error_msg'] ;	
			
?>

   
<tr>
		<td>Error Number:</td>
		<td><?php echo $errorCode; ?></td>
	</tr>
	<tr>
		<td>Error Message:</td>
		<td><?php echo $errorMessage; ?></td>
	</tr>
	
	
	</table>
</center>
<?php } else {

/* If there is no URL Errors, Construct the HTML page with 
   Response Error parameters.   
   */
?>

<center>
	<b> PayPal API Error</b><br>
	
    <table width = 400>
    <?php 
    
    $this->renderPartial('showallresponse',array('resArray'=>$resArray));
    ?>
    </table>
</center>		
	
<?php 
}// end else
?>
</center>
</table>


