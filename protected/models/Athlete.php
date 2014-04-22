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
			array('first_name,last_name,height,email, weight, sex_typeid', 'required'),
			array('sex_typeid', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>45),
		    array('email', 'email','checkMX'=>true),
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
			'height' => 'Height(cm)',
			'weight' => 'Weight(kg)',
			'sex_typeid' => 'Sex',
            		'fullName' => 'Athlete'
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
		//$criteria->compare('sex_typeid',$sex/*$this->sex_typeid*/);

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

        /**
         * Gets the stats for a single athelete
         * @param type $athleteid
         * @param type $start_date
         * @param type $end_date
         * @return type
         */
        public function getStats($athleteid, $start_date, $end_date) {
            $sql = 'select 
                        at.id as athleteid,
                        at.first_name,
                        at.last_name,
                        at.height as athlete_height,
                        at.weight as athlete_weight,
                        at.sex_typeid,
                        rd.id as record_dataid,
                        rd.weight as record_data_weight,
                        rd.height as record_data_height,
                        rd.calories as record_data_calories,
                        rd.assist as record_data_assist,
                        rd.reps as record_data_reps,
                        rd.time as record_data_time,
                        rd.date as record_data_date,
                        ex.id as exerciseid, ex.name as exercise_name,
                        wde.total_reps as workout_detail_total_reps,
                        wde.total_time as workout_detail_total_time,
                        wde.measure_weight as workout_detail_measure_weight,
                        wde.measure_height as workout_detail_measure_height,
                        wde.measure_calories as workout_detail_measure_calories,
                        wde.measure_assist as workout_detail_measure_assist,
                        wo.name as workout_name,
                        wt.name as workout_type_name
                    from
                        athlete at
                            left outer join
                        record_data rd ON rd.athleteid = at.id
                            left outer join
                        workout_detail wde ON wde.id = rd.workout_detailid
                            left outer join
                        exercise ex ON ex.id = wde.exerciseid
                            left outer join
                        workout wo ON wo.id = wde.workoutid
                            left outer join
                        workout_type wt ON wt.id = wo.workout_typeid
                    where
                        at.id = :athleteid and (rd.id is null or rd.date between :start_date and :end_date)
                    order by at.id , rd.date desc';
            
            $connection=Yii::app()->db;   
            $command=$connection->createCommand($sql);
            $command->params = array(":athleteid" => $athleteid, 
                                    ":start_date" => $start_date,
                                    ":end_date" => $end_date);
            $dataReader=$command->query(); 
            $rows=$dataReader->readAll();

            $max_press = 0;
            $max_squat = 0;
            $max_lift = 0;
            $athlete_stats = array(
                'id'=> $rows[0]["athleteid"],
                'athlete_name' => $rows[0]["first_name"] . " " .$rows[0]["last_name"],
                'average_volume' => 0,
                'average_fitness' => 0,
                'max_squat' => 0,
                'max_press' => 0,
                'max_deadlift' => 0,
                'WOD' => array(),
                'aux' => array(
                    'athlete_weight' => $rows[0]["athlete_weight"],
                    'athlete_height' => $rows[0]["athlete_height"],
                    'sex_typeid' => $rows[0]["sex_typeid"]
                )
            );
            
            $current_date = new DateTime($start_date);
            $limit_date = new DateTime($end_date);
            $last_processed_date = "01-01-1900";
            
            $wod = array();
            foreach ($rows as $row) {
                if ($last_processed_date == $row["record_data_date"]) {
                    continue;
                } 

                // fill date range
                while ($current_date <= $limit_date) {
                    $wod_day = array(
                        'date' => $current_date->format('m/d/Y'),   //->format('m/d/Y'),
                        'name' => NULL,
                        'type' => NULL,
                        'value' => NULL,
                        'volume' => NULL,
                        'fitness' => NULL,         
                        'exercises' => array()
                    );
                    
                    $last_processed_date = $row["record_data_date"];

                    $data_for_day = $this->filter_by_date($rows, new DateTime($wod_day["date"]));
                    if (count($data_for_day) > 0) {
                        $wod_day['name'] = $data_for_day[0]["workout_name"];
                        $wod_day['type'] = $data_for_day[0]["workout_type_name"];
                        $wod_day['value'] = $data_for_day[0]["workout_type_name"] == 'ForReps' ? $data_for_day[0]["workout_detail_total_time"] : $data_for_day[0]["workout_detail_total_reps"];
                        $wod_day['volume'] = 0;
                        $wod_day['fitness'] = 0;
                        
                        foreach ($data_for_day as $in_exercise) {
                            $exercise = array(
                                            "id" => $in_exercise["exerciseid"],
                                            "name" => $in_exercise["exercise_name"],
                                            "prop" => array ()
                                        );

                            if ($in_exercise["record_dataid"] != null) {
                                //if ($row["workout_type_name"] == 'ForReps') {
                                    array_push($exercise["prop"], array(
                                        "type" => "Reps",
                                        "value" => $in_exercise["record_data_reps"]
                                    ));
                                //}

                              //  if ($in_exercise["workout_type_name"] == 'ForTime') {
                                    array_push($exercise["prop"], array(
                                        "type" => "Time",
                                        "value" => $in_exercise["workout_type_name"] == 'ForTime' ? 
                                            $in_exercise["record_data_time"] :
                                            $in_exercise["workout_detail_total_time"]
                                    ));
                           //     }

                                if ($in_exercise["workout_type_name"] == 'MaxWeight') { 
                                    if(strtolower($in_exercise["workout_name"]) == "crossfit total") {
                                        if (strtolower($exercise["name"]) == 'back squat') {
                                            $max_squat = $in_exercise["record_data_weight"];
                                        }

                                        if (strtolower($exercise["name"]) == 'strict press') {
                                            $max_press = $in_exercise["record_data_weight"];
                                        }

                                        if (strtolower($exercise["name"]) == 'dead lift') {
                                            $max_lift = $in_exercise["record_data_weight"];
                                        }
                                    }
                                }

                                $this->fill_exercise_property($in_exercise, $exercise, "workout_detail_measure_weight", "Weight", "record_data_weight");
                                $this->fill_exercise_property($in_exercise, $exercise, "workout_detail_measure_height", "Height", "record_data_height");
                                $this->fill_exercise_property($in_exercise, $exercise, "workout_detail_measure_calories", "Calories", "record_data_calories");
                                $this->fill_exercise_property($in_exercise, $exercise, "workout_detail_measure_assist", "Assist", "record_data_assist");
                            }

                            $exercise_obj = new ArrayObject($exercise);
                            array_push($wod_day["exercises"], $exercise_obj->getArrayCopy());
                        }
                    }
                    
                    $wod_day_obj = new ArrayObject($wod_day);
                    array_push($wod, $wod_day_obj->getArrayCopy());
                    $current_date->add(new DateInterval("P1D"));
                } 
            }
            $wod_obj = new ArrayObject($wod);
            $athlete_stats["WOD"] = $wod_obj->getArrayCopy();
            $this->calculate_results($athlete_stats);

            $athlete_stats['max_squat'] = $max_squat;
            $athlete_stats['max_press'] = $max_press;
            $athlete_stats['max_deadlift'] = $max_lift;
            
            // echo '<pre>'; var_dump($athlete_stats); echo '</pre>'; 
            
            return $athlete_stats; 
        }
        
        /**
         * Gets the statistics for all athletes in a given range.
         * 
         * @param type $start_date
         * @param type $end_date
         * @return type
         */
        public function getOverallStats($start_date, $end_date) {
            $sql = 'select 
                        at.id as athleteid,
                        at.first_name,
                        at.last_name,
                        at.height as athlete_height,
                        at.weight as athlete_weight,
                        at.sex_typeid,
                        rd.id as record_dataid,
                        rd.weight as record_data_weight,
                        rd.height as record_data_height,
                        rd.calories as record_data_calories,
                        rd.assist as record_data_assist,
                        rd.reps as record_data_reps,
                        rd.time as record_data_time,
                        rd.date as record_data_date,
                        ex.id as exerciseid, ex.name as exercise_name,
                        wde.total_reps as workout_detail_total_reps,
                        wde.total_time as workout_detail_total_time,
                        wde.measure_weight as workout_detail_measure_weight,
                        wde.measure_height as workout_detail_measure_height,
                        wde.measure_calories as workout_detail_measure_calories,
                        wde.measure_assist as workout_detail_measure_assist,
                        wo.id as workoutid,
                        wo.name as workout_name,
                        wt.name as workout_type_name
                    from
                        athlete at
                             join
                        record_data rd ON rd.athleteid = at.id
                             join
                        workout_detail wde ON wde.id = rd.workout_detailid
                             join
                        exercise ex ON ex.id = wde.exerciseid
                             join
                        workout wo ON wo.id = wde.workoutid
                             join
                        workout_type wt ON wt.id = wo.workout_typeid
                    where
                        rd.date between :start_date and :end_date
                    order by at.id, rd.date, wo.id';
            
            $connection=Yii::app()->db;   
            $command=$connection->createCommand($sql);
            $command->params = array(":start_date" => $start_date,
                                    ":end_date" => $end_date);
            $dataReader=$command->query(); 
            $rows=$dataReader->readAll();

            $i = 0;
            $athlete_stats = array("Athlete" => array());
            $current_athleteid = -1;
            
            while ($i < count($rows)) {
                $athlete = array(
                    'id'=> $rows[$i]["athleteid"],
                    'athlete_name' => $rows[$i]["first_name"] . " " .$rows[$i]["last_name"],
                    'average_volume' => 0,
                    'average_fitness' => 0,
                    'max_squat' => 0,
                    'max_press' => 0,
                    'max_deadlift' => 0,
                    'WOD' => array(),
                    'aux' => array(
                        'athlete_weight' => $rows[$i]["athlete_weight"],
                        'athlete_height' => $rows[$i]["athlete_height"],
                        'sex_typeid' => $rows[$i]["sex_typeid"]
                    )
                );
                $current_athleteid = $rows[$i]["athleteid"];
                
                $max_press = 0;
                $max_squat = 0;
                $max_lift = 0;

                while ($i < count($rows) 
                        && $current_athleteid == $rows[$i]["athleteid"]) {
                         
                    $wod = array();
                    $current_date = $rows[$i]["record_data_date"];
                
                    while ($i < count($rows) 
                            && $current_athleteid == $rows[$i]["athleteid"] 
                            && $current_date == $rows[$i]["record_data_date"]) {
                       
                        $date = new DateTime($current_date);
                        $wod_day = array(
                            'date' => $date->format('m/d/Y'),
                            'name' => $rows[$i]["workout_name"],
                            'type' => $rows[$i]["workout_type_name"],
                            'value' => $rows[$i]["workout_type_name"] == 'ForReps' ? $rows[$i]["workout_detail_total_time"] : $rows[$i]["workout_detail_total_reps"],
                            'volume' => 0,
                            'fitness' => 0,         
                            'exercises' => array()
                        );

                        $current_workout = $rows[$i]["workoutid"];

                        while ($i < count($rows) 
                                && $current_athleteid == $rows[$i]["athleteid"] 
                                && $current_date == $rows[$i]["record_data_date"] 
                                && $current_workout == $rows[$i]["workoutid"]) {
 
                            $exercise = array(
                                            "id" => $rows[$i]["exerciseid"],
                                            "name" => $rows[$i]["exercise_name"],
                                            "prop" => array ()
                                        );
                            //if ($row["workout_type_name"] == 'ForReps') {
                                array_push($exercise["prop"], array(
                                    "type" => "Reps",
                                    "value" => $rows[$i]["record_data_reps"]
                                ));
                            //}

                            if ($rows[$i]["workout_type_name"] === 'ForTime') {
                                array_push($exercise["prop"], array(
                                    "type" => "Time",
                                    "value" => $rows[$i]["record_data_time"]
                                ));
                            }
                            
                            if ($rows[$i]["workout_type_name"] == 'MaxWeight') { 
                                if(strtolower($rows[$i]["workout_name"]) == "crossfit total") {
                                    if (strtolower($exercise["name"]) == 'back squat') {
                                        $max_squat = $rows[$i]["record_data_weight"];
                                    }

                                    if (strtolower($exercise["name"]) == 'strict press') {
                                        $max_press = $rows[$i]["record_data_weight"];
                                    }

                                    if (strtolower($exercise["name"]) == 'dead lift') {
                                        $max_lift = $rows[$i]["record_data_weight"];
                                    }
                                }
                            }

                            $this->fill_exercise_property($rows[$i], $exercise, "workout_detail_measure_weight", "Weight", "record_data_weight");
                            $this->fill_exercise_property($rows[$i], $exercise, "workout_detail_measure_height", "Height", "record_data_height");
                            $this->fill_exercise_property($rows[$i], $exercise, "workout_detail_measure_calories", "Calories", "record_data_calories");
                            $this->fill_exercise_property($rows[$i], $exercise, "workout_detail_measure_assist", "Assist", "record_data_assist");

                            $exercise_obj = new ArrayObject($exercise);
                            array_push($wod_day["exercises"], $exercise_obj->getArrayCopy());

                            $i += 1;
                        }   // workout loop
                        $wod_day_obj = new ArrayObject($wod_day);
                        array_push($wod, $wod_day_obj->getArrayCopy());
                    }      // date loop
                    $wod_obj = new ArrayObject($wod);
                    $athlete["WOD"] = $wod_obj->getArrayCopy();
                }
                $this->calculate_results($athlete);
                
                $athlete['max_squat'] = $max_squat;
                $athlete['max_press'] = $max_press;
                $athlete['max_deadlift'] = $max_lift;
                
                $athlete_obj = new ArrayObject($athlete);
                array_push($athlete_stats["Athlete"], $athlete_obj->getArrayCopy());
            }       // athlete  loop
            
            // echo '<pre>'; var_dump($athlete_stats); echo '</pre>'; 
            
            // fill all dates with placeholders
            $filled_stats = array("Athlete" => array());
            $loop_end_date = date("m/d/Y", strtotime($end_date));
            $iterator = 0;
            while($iterator < count($athlete_stats["Athlete"]))
            {
                $result = array();
                $date = date("m/d/Y", strtotime($start_date));
                while ($date <= $loop_end_date) {
                    $flag = false;
                    foreach ($athlete_stats["Athlete"][$iterator]["WOD"] as $wod) {
                        if ($wod["date"] < $date) {
                            break;
                        }
                        if ($date == $wod["date"]) {
                            array_push($result, $wod);
                            $flag = true;
                            break;
                        }
                    }
                    if (!$flag) {
                        array_push($result, array(                        
                            'date' => $date,
                            'name' => "",
                            'type' => "",
                            'value' => "",
                            'volume' => 0,
                            'fitness' => 0,         
                            'exercises' => array()
                            ));
                    }
                    $date = date("m/d/Y", strtotime("+1 day", strtotime($date)));
                }
                $athlete_stats["Athlete"][$iterator]["WOD"] = $result;
                $iterator += 1;
            }
            // echo("<pre>"); var_dump($athlete_stats); echo("</pre>"); 
           
            return $athlete_stats; 
        }

        
        private function fill_exercise_property($input, &$output, $property, $label, $value) {
            if ($input[$property] == 1) {
                array_push($output["prop"], array(
                        "type" => $label,
                        "value" => $input[$value]
                    ));
            }
        }
        
        private function filter_by_date($data, $date) {
            $result = array();
            foreach ($data as $record) {
                if (!is_null($record["record_data_date"])) {
                    $record_data_date_as_date = new DateTime($record["record_data_date"]);
                    if ($record_data_date_as_date == $date) {
                        array_push($result, $record);          
                    }
                }                    
            }
            return $result;
        }
        
        private function calculate_results(&$data) {
            $params = $this->load_parameters($data);
            // echo '<pre>'; var_dump($params); echo '</pre>'; die();
            
            $Gravity = 9.81;
            $body_profiles = BodyProfiles::model()->findAll();

            $index = 0;
            
            // variables used to calculate the average
            $sum_fitness = 0;
            $sum_volume = 0;
            $frequency = 0;
            foreach ($data["WOD"] as $wod) {
                $fitness = 0;
                $volume = 0;
                foreach ($wod["exercises"] as $exercise) {
                    $force = array();
                    $distance = array();
                    $work = array();
                    $power = array();
                    foreach ($body_profiles as $body_profile) {
                        // calculate force
                        $key = $body_profile->body_part_name;
                        if ($body_profile->body_part_name != 'Weight') {
                            if (array_key_exists($key, $params)) {
                                $force[$body_profile->body_part_name] = $data["aux"]["athlete_weight"] * $Gravity * (float)$params[$key]["body_part_weight"] / 100;
                            } else {
                                echo "Key does not exist " . $key;
                                $force[$body_profile->body_part_name] = 0;
                            }
                        } else {
                            $force[$body_profile->body_part_name] = 0;
                            $weight = $this->get_exercise_property($exercise, "Weight");
                            if ($weight != 0) {
                                $force[$body_profile->body_part_name] = $Gravity * (float)$params[$key]["body_part_weight"] * $weight / 100 ;
                            }
                        }
                        
                        // calculate distance
                        $sum = 0;
                        $other_distance = 0;
                        foreach ($body_profiles as $body_profile2) {
                            $key = $this->build_key($data, $body_profile->body_part_name, $body_profile2->body_part_name, $exercise["id"]);
                            $bp_height = $data["aux"]["sex_typeid"] == 1 ? $body_profile2->height_male : $body_profile2->height_female;
                            if ($body_profile2->body_part_name == 'Other distance') {
                                $other_distance = $params[$key]["value"]; 
                            } else if ($body_profile2->body_part_name != 'Weight') {
                                if (array_key_exists($key, $params)) {
                                    // echo "[" . $body_profile->body_part_name . "-" . $body_profile2->body_part_name ."]";
                                    $sum = $sum + $bp_height * $params[$key]["value"] /  100;
                                }
                            }                            
                        }
                        $rd_height = $this->get_exercise_property($exercise, "Height") / 100;
                        $bp_height = $data["aux"]["sex_typeid"] == 1 ? $body_profile->height_male : $body_profile->height_female;

                        $distance[$body_profile->body_part_name]  = (($data["aux"]["athlete_height"]/100) * $sum + ($bp_height * $rd_height * $other_distance));
                    
                        // Calcule Work
                        $reps = $this->get_exercise_property($exercise, "Reps");

                        if ($reps != 0) {
                            $work[$body_profile->body_part_name]  = $reps * $force[$body_profile->body_part_name] * $distance[$body_profile->body_part_name]; 
                        } else {
                            $work[$body_profile->body_part_name]  = 0;
                        }
                    
                        // calculate power
                        // power = work / time in seconds
                        $rd_time = $this->get_exercise_property($exercise, "Time");
                        if ($rd_time != "00:00:00") {
                            $t = new DateTime($rd_time);
                            $minutes = (int) $t->format("i");
                            $seconds = (int) $t->format("s");
                            $total =  $minutes * 60 + $seconds;
                            if ($total > 0) {
                                $power[$body_profile->body_part_name]  = $work[$body_profile->body_part_name] / $total;
                            } else {
                                $power[$body_profile->body_part_name]  = 0;
                            }
                        } else {
                            $power[$body_profile->body_part_name]  = 0;
                        }
                    }
                    
                    $assist = $this->get_exercise_property($exercise, "Assist");
                    $fitness_output = $this->sum($power) * (1- ($assist/100));
                    $total_effort = $this->sum($work) * (1 - ($assist/100));

                    $fitness += $fitness_output;
                    $volume += $total_effort;

//                    echo '<pre> Force '; var_dump($force); echo '</pre>'; 
//                    echo '<pre> Distance'; var_dump($distance); echo '</pre>'; 
//                    echo '<pre> Work'; var_dump($work); echo '</pre>'; 
//                    echo '<pre> Power'; var_dump($power); echo '</pre>'; 
//                    echo '<pre> Fitness output'; var_dump($fitness_output); echo '</pre>'; 
//                    echo '<pre> Total Effort'; var_dump($total_effort); echo '</pre>'; 
                    }
                    $data["WOD"][$index]["fitness"] = $fitness / 10;
                    $data["WOD"][$index]["volume"] = $volume / 1000;
                    if ($fitness > 0) {
                        $sum_fitness += $data["WOD"][$index]["fitness"];
                        $sum_volume += $data["WOD"][$index]["volume"];
                        $frequency += 1;
                    }

//                    echo '<pre> Fitness: '; var_dump($data["WOD"][$index]["fitness"]); echo '</pre>'; 
//                    echo '<pre> Volume: '; var_dump($data["WOD"][$index]["volume"]); echo '</pre>'; 

                    $index++;
                }
            
            if ($frequency > 0) {
                $data["average_fitness"] = $sum_fitness / $frequency;
                $data["average_volume"] = $sum_volume / $frequency;
            }
        }
             
        private function sum($data) {
            $s = 0;
            foreach ($data as $d) {
                $s += $d;
            }
            return $s;
        }

        private function get_exercise_property($exercise, $prop_name) {
            $result = 0;
            foreach ($exercise["prop"] as $prop) {
                if($prop["type"] == $prop_name) {
                    $result = $prop["value"];
                }
            }
            return $result;
        }
        
        /**
         * Load the parameters from DB
         * @return type: Key => value array
         * key = sex_typeid + body_profileid + exerciseid
         */
        private function load_parameters($athlete) {
            $sql = 'select 
		bp.id as body_profileid,
		bp.body_part_name as body_part_name,
		bp.weight_male as body_part_weight_male,
		bp.height_male as body_part_height_male,
		bp.weight_female as body_part_weight_female,
		bp.height_female as body_part_height_female,
		bp.exercise_detail_attr_index as exercise_detail_attr_index,
		exd.id as exercise_detailid,
		exd.attr1,
		exd.attr2,
		exd.attr3,
		exd.attr4,
		exd.attr5,
		exd.attr6,
		exd.attr7,
		ex.id as exerciseid,
		ex.name as exercise_name
	from
		body_profiles bp
			left outer join
		exercise_detail exd ON exd.body_profilesId = bp.Id
			left outer join
		exercise ex ON ex.id = exd.exerciseid
	order by bp.exercise_detail_attr_index';
            
            $connection=Yii::app()->db;   
            $command=$connection->createCommand($sql);
            $dataReader=$command->query(); 
            $rows=$dataReader->readAll();
            $dataReader->close();
            
            $parameters = array();
            foreach ($rows as $row) {
                $this->add_parameter($parameters, $athlete, $row, "Head and Neck", "attr1");
                $this->add_parameter($parameters, $athlete, $row, "Trunk", "attr2");
                $this->add_parameter($parameters, $athlete, $row, "Upper Arm", "attr3");
                $this->add_parameter($parameters, $athlete, $row, "Forearm and half hand", "attr4");
                $this->add_parameter($parameters, $athlete, $row, "Thigh", "attr5");
                $this->add_parameter($parameters, $athlete, $row, "Leg and foot", "attr6");
                $this->add_parameter($parameters, $athlete, $row, "Weight", "attr7");
            }
          //  echo 'parameters <pre>';var_dump($parameters);echo '</pre>'; 
            
            return $parameters;
        }
        
        private function add_parameter(&$target, $athlete, $row, $body_part_name, $attr) {
            $key = $row["body_part_name"];
            $value = array(
                'body_profileid' => $row['body_profileid'],
                'body_part_name' => $row['body_part_name'],
                'body_part_weight' => 0,
                'body_part_height' => 0,
                'exercise_detailid' => $row['exercise_detailid'],
                'value' => 0,
                'exerciseid' => $row['exerciseid'],
                'exercise_name' => $row['exercise_name']
            );
            if ($athlete["aux"]["sex_typeid"] == 1) {
                $value['body_part_weight'] = $row['body_part_weight_male'];
                $value['body_part_height'] = $row['body_part_height_male'];
            } else {
                $value['body_part_weight'] = $row['body_part_weight_female'];
                $value['body_part_height'] = $row['body_part_height_female'];
            }
            
            $target[$key] = $value; 
            
            if ($attr != null && $row[$attr] == 0)
                return;

            $key = $row["body_part_name"] . "-" . $body_part_name . "-" . $row["exerciseid"];

            $value = array(
                'body_profileid' => $row['body_profileid'],
                'body_part_name' => $row['body_part_name'],
                'body_part_weight' => 0,
                'body_part_height' => 0,
                'exercise_detailid' => $row['exercise_detailid'],
                'value' => $row[$attr],
                'exerciseid' => $row['exerciseid'],
                'exercise_name' => $row['exercise_name']
            );

            if ($athlete["aux"]["sex_typeid"] == 1) {
                $value['body_part_weight'] = $row['body_part_weight_male'];
                $value['body_part_height'] = $row['body_part_height_male'];
            } else {
                $value['body_part_weight'] = $row['body_part_weight_female'];
                $value['body_part_height'] = $row['body_part_height_female'];
            }
            
            $target[$key] = $value; 

            //echo '<pre>';var_dump($target);echo '</pre>'; 
        }
        
        private function build_key($athlete, $body_part_name_1, $body_part_name_2, $exerciseid) {
            if ($body_part_name_2 == NULL) {
                $key = $body_part_name_1;
            } else {
                $key = $body_part_name_1 . "-"
                       . $body_part_name_2 . "-"
                       . $exerciseid;
            }
            return $key;
        }

    function getFullName() {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function deleteRecordDataByAthlete($id){
    	
    	Yii::app()->db->createCommand()->delete('record_data', 'athleteid=:id', array(':id' => $id));
    }

}
