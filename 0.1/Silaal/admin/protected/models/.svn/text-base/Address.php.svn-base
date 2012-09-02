<?php

/**
 * This is the model class for table "yc_address".
 *
 * The followings are the available columns in table 'yc_address':
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $street
 * @property string $zipcode
 * @property string $city
 * @property string $country_id
 */
class Address extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function isEmpty($vars) {
		return 
			$vars['street'] == '' 
			|| $vars['zipcode'] == '' 
			|| $vars['city'] == '' 
			|| $vars['country_id'] == ''; 
	}

	public function renderAddress() {
		echo $this->firstname . ' ' . $this->lastname . '<br />';
		echo $this->street . '<br />';
		echo $this->zipcode . ' ' . $this->city . '<br />';
		echo $this->country_id;
	}

	public function tableName()
	{
		return 'yc_address';
	}

	public function rules()
	{
		return array(
			array('firstname, lastname, street, zipcode, city, country_id', 'required'),
			array('firstname, lastname, street, zipcode, city, country_id', 'length', 'max'=>255),
			array('id, firstname, lastname, street, zipcode, city, country_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'country'=>array(self::BELONGS_TO,'Country','country_id',),	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'firstname' => Yii::t('msg', 'Firstname'),
			'lastname' => Yii::t('msg', 'Lastname'),
			'street' => Yep::t('Street'),
			'zipcode' =>Yep::t('Zipcode'),
			'city' => Yep::t('City'),
			'country_id' => Yep::t('Country ID'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country_id',$this->country_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
