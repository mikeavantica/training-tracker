<?php

/**
 * This is the model class for table "workout_detail".
 *
 * The followings are the available columns in table 'workout_detail':
 * @property integer $id
 * @property integer $measure_weight
 * @property integer $measure_height
 * @property integer $measure_calories
 * @property integer $measure_assist
 * @property integer $total_reps
 * @property string $total_time
 * @property integer $workoutid
 * @property integer $exerciseid
 *
 * The followings are the available model relations:
 * @property RecordData[] $recordDatas
 * @property Workout $workout
 * @property Exercise $exercise
 */
class WorkoutDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'workout_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('measure_weight, measure_height, measure_calories, measure_assist, workoutid, exerciseid', 'required'),
			array('measure_weight, measure_height, measure_calories, measure_assist, total_reps, workoutid, exerciseid', 'numerical', 'integerOnly'=>true),
			array('total_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, measure_weight, measure_height, measure_calories, measure_assist, total_reps, total_time, workoutid, exerciseid', 'safe', 'on'=>'search'),
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
			'recordDatas' => array(self::HAS_MANY, 'RecordData', 'workout_detailid'),
			'workout' => array(self::BELONGS_TO, 'Workout', 'workoutid'),
			'exercise' => array(self::BELONGS_TO, 'Exercise', 'exerciseid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'measure_weight' => 'Measure Weight',
			'measure_height' => 'Measure Height',
			'measure_calories' => 'Measure Calories',
			'measure_assist' => 'Measure Assist',
			'total_reps' => 'Total Reps',
			'total_time' => 'Total Time',
			'workoutid' => 'Workoutid',
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
		$criteria->compare('measure_weight',$this->measure_weight);
		$criteria->compare('measure_height',$this->measure_height);
		$criteria->compare('measure_calories',$this->measure_calories);
		$criteria->compare('measure_assist',$this->measure_assist);
		$criteria->compare('total_reps',$this->total_reps);
		$criteria->compare('total_time',$this->total_time,true);
		$criteria->compare('workoutid',$this->workoutid);
		$criteria->compare('exerciseid',$this->exerciseid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search2($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
		$criteria->addCondition('workoutid= "'. $id .'"');
		$criteria->compare('id',$this->id);
		$criteria->compare('measure_weight',$this->measure_weight);
		$criteria->compare('measure_height',$this->measure_height);
		$criteria->compare('measure_calories',$this->measure_calories);
		$criteria->compare('measure_assist',$this->measure_assist);
		$criteria->compare('total_reps',$this->total_reps);
		$criteria->compare('total_time',$this->total_time,true);
		$criteria->compare('workoutid',$this->workoutid);
		$criteria->compare('exerciseid',$this->exerciseid);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	public function hasSons($workout_id)
	{   $sql = "select total_time,total_reps from workout_detail where workoutid = :workout";
	    $result = false;
	    $arr;
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":workout", $workout_id, PDO::PARAM_STR);
		$arr = $command->queryAll();
		
		return $arr;
	}
	
	public function deleteSons($workout_id)
	{
		$sql = "select id from workout_detail where workoutid = :workout";
		$result = false;
		$arr = array();
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":workout", $workout_id, PDO::PARAM_STR);
		$arr = $command->queryAll();
		foreach($arr as $detail){
			Yii::app()->db->createCommand()->delete('record_data', 'workout_detailid=:id', array(':id' => $detail['id']));
			
		}
		Yii::app()->db->createCommand()->delete('workout_detail', 'workoutid=:id', array(':id' => $workout_id));
		
		
	}
	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WorkoutDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
