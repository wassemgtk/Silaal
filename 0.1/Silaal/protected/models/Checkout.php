<?php
class Checkout extends CFormModel
{
	// step1 variables,
	public $account;
	//step2 variables
	//public $firstname,$lastname,$email,$telephone,$fax,$company,$address_1,$address_2,$city,$postcode,$country_id,$zone_id,$shipping_address;
	public $firstname, $lastname, $street, $zipcode, $city, $state, $country_id, $email ;
	public $firstname1, $lastname1, $street1, $zipcode1, $city1, $state1, $country_id1  ;
	//step3 variables
	//public $firstname1,$lastname1,$email1,$telephone1,$fax1,$company1,$address_11,$address_21,$city1,$postcode1,$country_id1,$zone_id,$shipping_address;
	
	//step4 variables
	public $delivery_method, $delivery_comment;
	//step5 variables
	public $payment_method, $payment_comment;
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
				array('account', 'required','on'=>'step1'),
				//array('firstname,lastname,email,telephone,fax,company,address_1,address_2,city,postcode,country_id,zone_id,shipping_address','required', 'on'=>'step2'),
				array('firstname,lastname,street,zipcode,city,state,country_id,email','required', 'on'=>'step2'),
				array('firstname1,lastname1,street1,zipcode1,city1,state1,country_id1','required', 'on'=>'step3'),
				array('delivery_method, delivery_comment', 'required', 'on'=>'step4'),
				array('payment_method, payment_comment', 'required', 'on'=>'step5'),
				array('email','email', 'on'=>'step2'),
				
				
				
		);
	}
}