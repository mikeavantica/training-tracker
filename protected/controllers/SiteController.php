<?php
class SiteController extends Controller {
	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array (
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha' => array (
						'class' => 'CCaptchaAction',
						'backColor' => 0xFFFFFF 
				),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page' => array (
						'class' => 'CViewAction' 
				) 
		);
	}
	public function actionOverallStats() {
                $athlete_stats = $this->getData(1, '04/01/2014', '04/30/2014');
		$athlete_stats = array("Athlete"=> array (
				array (
								"id" => 1,
								"athlete_name" => 'Juan Perez',
								"average_volume" => "139.3",
								"average_fitness" => "31.8",
								"max_squat" => "225",
								"max_press" => "95",
								"max_deadlift" => "275",
								
								"WOD" => array (
										array (
												"date" => "1/16/2014",
												"name" => "fran",
												"type" => "time",
												"value" => "20:00",
												"volume" => 90,
												"fitness" => 60,
												"exercises" => array (
														
														array (
																"name" => "Hand Stand Push Up",
																"prop" => array (
																		array (
																				"type" => "Reps",
																				"value" => 15 
																		),
																		array (
																				"type" => "Assist",
																				"value" => 0.40 
																		),
																		array (
																				"type" => "Height",
																				"value" => "40.55" 
																		) 
																) 
														),
														array (
																"name" => "Pistol",
																"prop" => array (
																		array (
																				"type" => "Reps",
																				"value" => 15 
																		),
																		array (
																				"type" => "Weight",
																				"value" => "60.70" 
																		),
																		array (
																				"type" => "Calories",
																				"value" => "60" 
																		) 
																) 
														) 
												) 
										),
										
										array (
												"date" => "1/17/2014",
												"name" => "mary",
												"type" => "reps",
												"value" => "45",
								"volume" => 90,
								"fitness" => 40,
								"exercises" => array (
		
										array (
												"name" => "Thruster",
												"prop" => array (
														array (
																"type" => "Reps",
																"value" => 15
														),
														array (
																"type" => "Assist",
																"value" => 0.40
														),
														array (
																"type" => "Height",
																"value" => "40.55"
														)
												)
										),
										array (
												"name" => "Pistol",
												"prop" => array (
														array (
																"type" => "Reps",
																"value" => 15
														),
														array (
																"type" => "Weight",
																"value" => "60.70"
														),
														array (
																"type" => "Calories",
																"value" => "60"
														)
												)
										)
								)
						)
				)
				
			),
			array (
					"id" => 1,
					"athlete_name" => 'Marcio Valle',
					"average_volume" => "150.5",
					"average_fitness" => "50.2",
					"max_squat" => "113",
					"max_press" => "79",
					"max_deadlift" => "89",
			
					"WOD" => array (
							array (
									"date" => "1/20/2014",
									"name" => "Henry",
									"type" => "time",
									"value" => "20:00",
									"volume" => 78,
									"fitness" => 29,
									"exercises" => array (
			
											array (
													"name" => "Hand Stand Push Up",
													"prop" => array (
															array (
																	"type" => "Reps",
																	"value" => 12
															),
															array (
																	"type" => "Assist",
																	"value" => 0.15
															),
															array (
																	"type" => "Height",
																	"value" => "80.5"
															)
													)
											),
											array (
													"name" => "Pistol",
													"prop" => array (
															array (
																	"type" => "Reps",
																	"value" => 15
															),
															array (
																	"type" => "Weight",
																	"value" => "60.70"
															),
															array (
																	"type" => "Calories",
																	"value" => "60"
															)
													)
											)
									)
							),
			
							array (
									"date" => "1/17/2014",
									"name" => "Marcos",
									"type" => "reps",
									"value" => "45",
									"volume" => 69,
									"fitness" => 31,
									"exercises" => array (
			
											array (
													"name" => "Thruster",
													"prop" => array (
															array (
																	"type" => "Time",
																	"value" => '7:35'
															),
															array (
																	"type" => "Assist",
																	"value" => 0.40
															),
															array (
																	"type" => "Height",
																	"value" => "40.55"
															)
													)
											),
											array (
													"name" => "Pistol",
													"prop" => array (
															array (
																	"type" => "Time",
																	"value" => '8:40'
															),
															array (
																	"type" => "Weight",
																	"value" => "60.70"
															),
															array (
																	"type" => "Calories",
																	"value" => "60"
															)
													)
											)
									)
							)
					)
			
			)
		));
		
	
		
		
		
		$this->render ( 'overallstats', array (
				'athlete_stats' => $athlete_stats 
		) );
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		$this->render ( 'index' );
		
		// }else{
		// $this->render('/site/login');
		/*
		 * $auth=Yii::app()->authManager; $bizRule='return !Yii::app()->user->isGuest;'; $auth->createRole('authenticated', 'authenticated user', $bizRule); $bizRule='return Yii::app()->user->isGuest;'; $auth->createRole('guest', 'guest user', $bizRule); $role = $auth->createRole('admin', 'administrator'); $auth->assign('admin',1);
		 */
		// adding admin to first user created
		
		// }
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
		if ($error = Yii::app ()->errorHandler->error) {
			if (Yii::app ()->request->isAjaxRequest)
				echo $error ['message'];
			else
				$this->render ( 'error', $error );
		}
	}
	
	/**
	 * Displays the contact page
	 */
	public function actionContact() {
		$model = new ContactForm ();
		if (isset ( $_POST ['ContactForm'] )) {
			$model->attributes = $_POST ['ContactForm'];
			if ($model->validate ()) {
				$name = '=?UTF-8?B?' . base64_encode ( $model->name ) . '?=';
				$subject = '=?UTF-8?B?' . base64_encode ( $model->subject ) . '?=';
				$headers = "From: $name <{$model->email}>\r\n" . "Reply-To: {$model->email}\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/plain; charset=UTF-8";
				
				mail ( Yii::app ()->params ['adminEmail'], $subject, $model->body, $headers );
				Yii::app ()->user->setFlash ( 'contact', 'Thank you for contacting us. We will respond to you as soon as possible.' );
				$this->refresh ();
			}
		}
		$this->render ( 'contact', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Displays the login page
	 */
	public function actionLogin() {
		$model = new LoginForm ();
		
		// if it is ajax validation request
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'login-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
		
		// collect user input data
		if (isset ( $_POST ['LoginForm'] )) {
			$model->attributes = $_POST ['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate () && $model->login ())
				$this->redirect ( Yii::app ()->user->returnUrl );
		}
		// display the login form
		$this->render ( 'login', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app ()->user->logout ();
		$this->redirect ( Yii::app ()->homeUrl );
	}
        
        private function getData($athleteid, $start_date, $end_date) {
            
            $connection=Yii::app()->db;   
            $sql = 'select at.id as athleteid, at.first_name, at.last_name, 
	at.height as athlete_height, at.weight as athlete_weight, at.sex_typeid,
	bp.Id as body_profile_id, bp.body_part__name, bp.weight as body_part_weight, bp.height as body_part_height,
	exd.attr1, exd.attr2, exd.attr3, exd.attr4, exd.attr5, exd.attr6, exd.attr7,
	rd.id as record_dataid, rd.weight as record_data_weight, rd.height as record_data_height, 
	rd.calories, rd.assist, rd.reps, rd.time as record_data_time, rd.date as record_data_date,
	ex.id as exerciseid, ex.name as exercise_name,
	wde.total_reps as workout_detail_total_reps,
	wde.total_time as workout_detail_total_time,
	wde.measure_weight as workout_detail_measure_weight,
	wde.measure_height as workout_detail_measure_height,
	wde.measure_calories as workout_detail_measure_calories,
	wde.measure_assist as workout_detail_measure_assist,
	wo.name	as workout_name,
	wt.name as workout_type_name
from athlete at
join body_profiles bp on bp.sex_typeid = at.sex_typeid
join exercise_detail exd on exd.body_profilesId = bp.Id
join exercise ex on ex.id = exd.exerciseid
left outer join record_data rd on rd.athleteid = at.id
left outer join workout_detail wde on wde.id = rd.workout_detailid
left outer join workout wo on wo.id = wde.workoutid
left outer join workout_type wt on wt.id = wo.workout_typeid
order by at.id, rd.date, bp.id
-- where at.id = 1';
            $command=$connection->createCommand($sql);
            $dataReader=$command->query(); 
            $rows=$dataReader->readAll();

            $athlete_stats = array ();
            $current_athleteid = -1;
            
            // get distinct athletes
            $current_athleteid = -1;
            foreach ($rows as $row) {
//                 var_dump($row); 
                $athleteid = $row["athleteid"];
                if ($current_athleteid != $athleteid) {
                    $athlete = array(
                        'id'=> $row["athleteid"],
                        'name' => $row["first_name"] . " " .$row["last_name"],
                        'average_volume' => 0,
                        'average_fitness' => 0,
                        'max_squat' => 0,
                        'max_press' => 0,
                        'max_deadlift' => 0,
                        'WOD' => array()
                    );

                    // fill date range
                    $current_date = new DateTime($start_date);
                    //echo $current_date->format('m/d/Y');
                    $limit_date = new DateTime($end_date);
                    $wod = array();
                    while ($current_date < $limit_date) {
                        $wod_day = array(
                            'date' => $current_date,   //->format('m/d/Y'),
                            'name' => $row["workout_name"],
                            'type' => $row["workout_type_name"],
                            'value' => $row["workout_type_name"] == 'ForReps' ? $row["workout_detail_total_time"] : $row["workout_detail_total_reps"],
                            'volume' => 90,
                            'fitness' => 60,         
                            'exercises' => array()
                        );
                        $data_for_day = $this->filter_by_date($rows, $wod_day["date"]);
                        var_dump($data_for_day);
                        $current_exercise_id = -1;
                        foreach ($data_for_day as $in_exercise) {
                            if($current_exercise_id != $in_exercise["exerciseid"]) {
                                $exercise = array(
                                            "name" => $in_exercise["exercise_name"],
                                            "prop" => array ()
                                            );
                                $current_exercise_id = $in_exercise["exerciseid"];
                            }
                            if ($in_exercise["workout_detail_measure_weight"] == 1) {
                                
                            }
                            if ($row["workout_type_name"] == 'ForReps') {
                                array_push($exercise["prop"], array(
                                        "type" => "Reps",
                                        "value" => $in_exercise["record_data_reps"]
                                    ));
                            }
//                                                        array (
//                                                                        "type" => "Assist",
//                                                                        "value" => 0.40
//                                                        ),
//                                                        array (
//                                                                        "type" => "Height",
//                                                                        "value" => "40.55"
//                                                        )

                            array_push($wod_day["exercises"], $exercise);
                        }
                        array_push($wod, $wod_day);
                        $current_date->add(new DateInterval("P1D"));
                    }
                    array_push($athlete["WOD"], $wod);
                    array_push($athlete_stats, $athlete);
                    $current_athleteid = $athleteid;
                }
            }
            
            echo '<pre>';
            var_dump($athlete_stats);
            echo '</pre>';
            die();
//            foreach ($athlete_stats as $athlete) {
//                foreach ($athlete->WOD as $wod) {
//                    $current_date = new DateTime($wod->date);
//                    echo $current_date->format('m/d/Y');
//
//
//                }
//            }
        
            
            return;
            
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
                
                
}