<?php

/**
 * This is the model class for table "body_profiles".
 *
 * The followings are the available columns in table 'body_profiles':
 * @property integer $Id
 * @property string $body_part__name
 * @property string $weight
 * @property string $height
 * @property integer $sex_typeid
 *
 * The followings are the available model relations:
 * @property SexType $sexType
 * @property ExerciseDetail[] $exerciseDetails
 */
class BodyProfiles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'body_profiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('body_part__name, weight, height, sex_typeid', 'required'),
			array('sex_typeid', 'numerical', 'integerOnly'=>true),
			array('body_part__name', 'length', 'max'=>45),
			array('weight, height', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, body_part__name, weight, height, sex_typeid', 'safe', 'on'=>'search'),
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
			'exerciseDetails' => array(self::HAS_MANY, 'ExerciseDetail', 'body_profilesId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'body_part__name' => 'Body Part Name',
			'weight' => 'Weight',
			'height' => 'Height',
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
		$criteria->compare('Id',$this->Id);
		$criteria->compare('body_part__name',$this->body_part__name,true);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('height',$this->height,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BodyProfiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
