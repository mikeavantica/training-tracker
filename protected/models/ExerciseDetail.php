<?php

/**
 * This is the model class for table "exercise_detail".
 *
 * The followings are the available columns in table 'exercise_detail':
 * @property integer $id
 * @property string $attr1
 * @property string $attr2
 * @property string $attr3
 * @property string $attr4
 * @property string $attr5
 * @property string $attr6
 * @property string $attr7
 * @property integer $body_profilesId
 * @property integer $exerciseid
 *
 * The followings are the available model relations:
 * @property Exercise $exercise
 * @property BodyProfiles $bodyProfiles
 */
class ExerciseDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'exercise_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('body_profilesId, exerciseid,attr1, attr2, attr3, attr4, attr5, attr6, attr7', 'required'),
			array('body_profilesId, exerciseid', 'numerical', 'integerOnly'=>true),
			array('attr1, attr2, attr3, attr4, attr5, attr6, attr7', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, attr1, attr2, attr3, attr4, attr5, attr6, attr7, body_profilesId, exerciseid', 'safe', 'on'=>'search'),
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
			'exercise' => array(self::BELONGS_TO, 'Exercise', 'exerciseid'),
			'bodyProfiles' => array(self::BELONGS_TO, 'BodyProfiles', 'body_profilesId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'attr1' => 'Attr1',
			'attr2' => 'Attr2',
			'attr3' => 'Attr3',
			'attr4' => 'Attr4',
			'attr5' => 'Attr5',
			'attr6' => 'Attr6',
			'attr7' => 'Attr7',
			'body_profilesId' => 'Body Profiles',
			'exerciseid' => 'Exercise',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('attr1',$this->attr1,true);
		$criteria->compare('attr2',$this->attr2,true);
		$criteria->compare('attr3',$this->attr3,true);
		$criteria->compare('attr4',$this->attr4,true);
		$criteria->compare('attr5',$this->attr5,true);
		$criteria->compare('attr6',$this->attr6,true);
		$criteria->compare('attr7',$this->attr7,true);
		$criteria->compare('body_profilesId',$this->body_profilesId);
		$criteria->compare('exerciseid',$this->exerciseid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ExerciseDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
