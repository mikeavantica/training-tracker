<?php

/**
 * This is the model class for table "body_profiles".
 *
 * The followings are the available columns in table 'body_profiles':
 * @property integer $Id
 * @property string $body_part_name
 * @property string $weight_male
 * @property string $height_male
 * @property string $weight_female
 * @property string $height_female
 * @property integer $exercise_detail_attr_index
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
			array('body_part_name, weight_male, height_male, weight_female, height_female, exercise_detail_attr_index', 'required'),
			array('exercise_detail_attr_index', 'numerical', 'integerOnly'=>true),
			array('body_part_name', 'length', 'max'=>45),
			array('weight_male, height_male, weight_female, height_female', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, body_part_name, weight_male, height_male, weight_female, height_female, exercise_detail_attr_index', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'body_part_name' => 'Body Part Name',
			'weight_male' => 'Weight Male',
			'height_male' => 'Height Male',
			'weight_female' => 'Weight Female',
			'height_female' => 'Height Female',
			'exercise_detail_attr_index' => 'Exercise Detail Attr Index',
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

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('body_part_name',$this->body_part_name,true);
		$criteria->compare('weight_male',$this->weight_male,true);
		$criteria->compare('height_male',$this->height_male,true);
		$criteria->compare('weight_female',$this->weight_female,true);
		$criteria->compare('height_female',$this->height_female,true);
		$criteria->compare('exercise_detail_attr_index',$this->exercise_detail_attr_index);

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
