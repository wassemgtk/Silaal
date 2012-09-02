<?php

/**
 * This is the model class for table "yc_category".
 *
 * The followings are the available columns in table 'yc_category':
 * @property integer $category_id
 * @property integer $parent_id
 * @property string $title
 * @property string $description
 * @property string $language
 *
 * The followings are the available model relations:
 * @property YcProducts[] $ycProducts
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function getChilds($id) {
		$data = array();

		foreach(self::model()->findAll('parent_id = ' . $id) as $model) {
			$row['text'] = CHtml::link($model->title, array('category/view', 'id' => $model->category_id));
			$row['children'] = self::getChilds($model->category_id);
			$data[] = $row;
		}
		return $data;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'yc_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('title, language', 'length', 'max'=>45),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('category_id, parent_id, title, description, language', 'safe', 'on'=>'search'),
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
			'ycProducts' => array(self::HAS_MANY, 'YcProducts', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'category_id' => 'Category',
			'parent_id' => 'Parent',
			'title' => 'Title',
			'description' => 'Description',
			'language' => 'Language',
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

		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('language',$this->language,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			//'pagination'=>array('pageSize'=>5,)
		));
	}
	protected function gridDataColumn($data,$row)
	{
		// ... generate the output for the column
	
		// Params:
		// $data ... the current row data
		// $row ... the row index
		//return $theCellValue;
		if($data->parent_id == '0')
			return '';//."(PID:$data->parent_id)";
		else{
		$var = Category::findByAttributes(array("category_id"=>$data->parent_id));
		//print_r($var[title]);exit;
		return $var['title'];//."(PID:$data->parent_id)";
		}
	}
	
	
}