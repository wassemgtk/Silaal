<?php
/**
 * This is the model class for table "yc_customer".
 *
 * The followings are the available columns in table 'yc_customer':
 * @property integer $customer_id
 * @property integer $user_id
 * @property integer $address_id
 * @property integer $delivery_address_id
 * @property integer $billing_address_id
 * @property string $email
 */

class Customer extends CActiveRecord
{
	public $terms_accepted = null;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return Yii::app()->params->customerTable;
	}

	public function rules()
	{
		return array(
			array('email', 'required'),
			array('address_id, customer_id, user_id', 'numerical', 'integerOnly'=>true),
			array('email', 'CEmailValidator'),
			array('customer_id, user_id, email', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'Orders' => array(self::HAS_MANY, 'Order', 'customer_id'),
			'ShoppingCarts' => array(self::HAS_MANY, 'ShoppingCart', 'customer_id'),
			'address' => array(self::BELONGS_TO, 'Address', 'address_id'),
			'billingAddress' => array(self::BELONGS_TO, 'BillingAddress', 'billing_address_id'),
			'deliveryAddress' => array(self::BELONGS_TO, 'DeliveryAddress', 'delivery_address_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'customer_id' => Yii::t('msg', 'Customer'),
			'user_id' => Yii::t('msg', 'Userid'),
			'address_id' => Yii::t('msg', 'Address'),
			'billing_address_id' => Yii::t('msg', 'Billing Address'),
			'delivery_address_id' => Yii::t('msg', 'Delivery Address'),
			'email' => Yii::t('msg', 'Email'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('customer_id',$this->customer_id);

		$criteria->compare('user_id',$this->user_id);

		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider('Customer', array(
			'criteria'=>$criteria,
		));
	}
}
