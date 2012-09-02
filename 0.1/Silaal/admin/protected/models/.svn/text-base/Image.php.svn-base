<?php

class Image extends CActiveRecord
{
	//public $image;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return Yii::app()->params->imageTable;
	}

	public function rules()
	{
		return array(
			array('title, filename, product_id', 'required','on'=>'productImage' ),
			array('title, filename', 'required','on'=>'feature' ),
			array('id, product_id', 'numerical', 'integerOnly'=>true,'on'=>'productImage' ),
			array('title, filename', 'length', 'max'=>45,'on'=>'productImage' ),
			//array('filename' => 'file', 'types' => 'png,gif,jpg,jpeg'),
			array('id, title, filename, product_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'Product' => array(self::BELONGS_TO, 'Products', 'product_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'title' => Yii::t('msg', 'Title'),
			'filename' => Yii::t('msg', 'Image File'),
			'product_id' => Yii::t('msg', 'Product'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('filename',$this->filename,true);

		$criteria->compare('product_id',$this->product_id);

		return new CActiveDataProvider('Image', array(
			'criteria'=>$criteria,
		));
	}
}
