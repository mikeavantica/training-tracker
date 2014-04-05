<?php

/**
 * This is the model class for table "record_data".
 *
 * The followings are the available columns in table 'record_data':
 * @property integer $id
 * @property string $weight
 * @property string $height
 * @property string $calories
 * @property string $assist
 * @property integer $reps
 * @property string $time
 * @property integer $athleteid
 * @property integer $workout_detailid
 * @property string $date
 *
 * The followings are the available model relations:
 * @property WorkoutDetail $workoutDetail
 * @property Athlete $athlete
 */
class RecordData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'record_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('weight, height, calories, assist, reps, time, athleteid, workout_detailid, date', 'required'),
			array('reps, athleteid, workout_detailid', 'numerical', 'integerOnly'=>true),
			array('weight, height, calories, assist', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, weight, height, calories, assist, reps, time, athleteid, workout_detailid, date', 'safe', 'on'=>'search'),
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
			'workoutDetail' => array(self::BELONGS_TO, 'WorkoutDetail', 'workout_detailid'),
			'athlete' => array(self::BELONGS_TO, 'Athlete', 'athleteid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'weight' => 'Weight',
			'height' => 'Height',
			'calories' => 'Calories',
			'assist' => 'Assist',
			'reps' => 'Reps',
			'time' => 'Time',
			'athleteid' => 'Athleteid',
			'workout_detailid' => 'Workout Detailid',
			'date' => 'Date',
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
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('calories',$this->calories,true);
		$criteria->compare('assist',$this->assist,true);
		$criteria->compare('reps',$this->reps);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('athleteid',$this->athleteid);
		$criteria->compare('workout_detailid',$this->workout_detailid);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RecordData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
