<?php
/*$this->breadcrumbs=array(
	'Default'=>array('/payments/default'),
	'Paypal',
);
$this->menu = array(
	array(
		'label' => 'IPN HOME',
		'url' => array('paypalipn'),
		),
	array(
		'label' => 'Paypal',
		'url' => array('paypal'),
		),
	array(
		'label' => 'Alertpay',
		'url' => array('Alertpay'),
		),
	array(
		'label' => '2checkout',
		'url' => array('twocheckout'),
		),
	);*/
//$config = $data;
//echo '<pre>';print_r($config); echo '</pre>';
?>
<!-- have to make adjustmen in title also -->
<?php $config = Yii::app()->db->createCommand()->select("*")->from("yc_paypal_config")->queryAll();
foreach($config as $row)$config[$row['NAME']]=$row['VALUE'];?>
<h1>Payment process</h1>
<div class="paypal point">
<form action="<?php if(($config['TEST_MODE']=='FALSE')) echo $config['ACTION_LIVE']; else echo $config['ACTION_TEST'];?>" method="POST" id="point">
<label for="price_input"><strong>Total point amount to pay</strong><br /></label><br />
<label for="price_input"><em>Please make at least $<?php echo number_format($config['MIN_AMOUNT'],2);?> and at max $<?php echo number_format($config['MAX_AMOUNT'],2);?> amount only. </em></label><br /><br />
<strong>$</strong>
<input type="text" name="amount" size="24" value="<?php echo number_format($config['DEFAULT_AMOUNT'],2)?>"/>

<input type="hidden" value="2" name="rm">
<input type="hidden" value="_xclick" name="cmd">
<input type="hidden" value="<?php echo $custom;?>" name="custom">
<input type="hidden" value="<?php echo $config['BUSINESS_EMAIL']?>" name="business">
<input type="hidden" value="<?php echo $config['CURRENCY_CODE']?>" name="currency_code">
<input type="hidden" value="<?php echo $config['SUCCESS_RETURN']?>" name="return">
<input type="hidden" value="<?php echo $config['CANCEL_RETURN']?>" name="cancel_return">
<input type="hidden" value="<?php echo $config['NOTIFY_URL']?>" name="notify_url">
<input type="hidden" value="<?php echo $config['ITEM_NAME']?>" name="item_name"><br /><br />
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" name="submit" alt="Paypal">
    </form>
</div>
