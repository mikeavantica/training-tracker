<?php

/**
 * This is the model class for table "athlete".
 *
 * The followings are the available columns in table 'athlete':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $height
 * @property string $weight
 * @property integer $sex_typeid
 *
 * The followings are the available model relations:
 * @property SexType $sexType
 * @property RecordData[] $recordDatas
 */
class Athlete extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'athlete';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, weight, sex_typeid', 'required'),
			array('sex_typeid', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>45),
			array('email', 'length', 'max'=>150),
			array('height, weight', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, last_name, email, height, weight, sex_typeid', 'safe', 'on'=>'search'),
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
			'sexType' => array(self::BELONGS_TO, 'SexType', 'sex_typeid'),
			'recordDatas' => array(self::HAS_MANY, 'RecordData', 'athleteid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'height' => 'Height',
			'weight' => 'Weight',
			'sex_typeid' => 'Gender',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
         $sex = 1;
		$criteria=new CDbCriteria;
      if($this->sex_typeid == 'Female' || $this->sex_typeid == 2){$sex = 2;}
		$criteria->compare('id',$this->id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('sex_typeid',$sex/*$this->sex_typeid*/,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Athlete the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
