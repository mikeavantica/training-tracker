<?php

/**
 * This is the model class for table "workout".
 *
 * The followings are the available columns in table 'workout':
 * @property integer $id
 * @property string $date
 * @property string $name
 * @property string $description
 * @property integer $workout_typeid
 *
 * The followings are the available model relations:
 * @property WorkoutType $workoutType
 * @property WorkoutDetail[] $workoutDetails
 */
class Workout extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'workout';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, description, workout_typeid', 'required'),
            array('workout_typeid', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 45),
            array('description', 'length', 'max' => 150),
            array('date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, date, name, description, workout_typeid', 'safe', 'on' => 'search'),
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
            'workoutType' => array(self::BELONGS_TO, 'WorkoutType', 'workout_typeid'),
            'workoutDetails' => array(self::HAS_MANY, 'WorkoutDetail', 'workoutid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'date' => 'Date',
            'name' => 'Name',
            'description' => 'Description',
            'workout_typeid' => 'Workout Type',
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

        $criteria = new CDbCriteria;
        //    $criteria2 = new CDbCriteria();
        //  $criteria2->select='name';
        //  $nose = WorkoutType::model()->findAll($criteria2);
        // $WorkoutType = WorkoutType::model()->findAll(array('condition'=>'id = $this->workout_typeid'),$criteria2);
        $criteria->compare('id', $this->id);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('workout_typeid', $this->workout_typeid);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Workout the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function hasSons($workout_id)
    {
        $sql = "select id from workout_detail where workoutid = :workout";
        $result = true;
        $arr;
        $command = Yii::app()->db->createCommand($sql);
        $command->bindValue(":workout", $workout_id, PDO::PARAM_STR);
        $arr = $command->queryColumn();
        if (!isset($arr[0])) {
            $result = false;

        }


        return $result;
    }

    public function getExtendedName()
    {
        return $this->name . ' [' . date('m/d/y', strtotime($this->date)) . ']';
    }

}
