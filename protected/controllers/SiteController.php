<?php
class SiteController extends Controller {
	/**
	 * Declares class-based actions.
	 */
	public $defaultAction = 'Login';
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
		//$first = Athlete::model()->findAllByPk($_GET['id']);
   
                date_default_timezone_get();
                $startDate = date("Y-m-1");
                $endDate = date("Y-m-d", strtotime("+1 month", strtotime($startDate)));
                $endDate = date("Y-m-d", strtotime("-1 day", strtotime($endDate)));
                
                $athlete_stats = Athlete::model()->getOverallStats($startDate, $endDate);
// 		$athlete_stats = array("Athlete"=> array (
// 				array (
// 								"id" => 1,
// 								"athlete_name" => 'Juan Perez',
// 								"average_volume" => "139.3",
// 								"average_fitness" => "31.8",
// 								"max_squat" => "225",
// 								"max_press" => "95",
// 								"max_deadlift" => "275",
								
// 								"WOD" => array (
// 										array (
// 												"date" => "1/16/2014",
// 												"name" => "fran",
// 												"type" => "time",
// 												"value" => "20:00",
// 												"volume" => 90,
// 												"fitness" => 60,
// 												"exercises" => array (
														
// 														array (
// 																"name" => "Hand Stand Push Up",
// 																"prop" => array (
// 																		array (
// 																				"type" => "Reps",
// 																				"value" => 15 
// 																		),
// 																		array (
// 																				"type" => "Assist",
// 																				"value" => 0.40 
// 																		),
// 																		array (
// 																				"type" => "Height",
// 																				"value" => "40.55" 
// 																		) 
// 																) 
// 														),
// 														array (
// 																"name" => "Pistol",
// 																"prop" => array (
// 																		array (
// 																				"type" => "Reps",
// 																				"value" => 15 
// 																		),
// 																		array (
// 																				"type" => "Weight",
// 																				"value" => "60.70" 
// 																		),
// 																		array (
// 																				"type" => "Calories",
// 																				"value" => "60" 
// 																		) 
// 																) 
// 														) 
// 												) 
// 										),
										
// 										array (
// 												"date" => "1/17/2014",
// 												"name" => "mary",
// 												"type" => "reps",
// 												"value" => "45",
// 								"volume" => 90,
// 								"fitness" => 40,
// 								"exercises" => array (
		
// 										array (
// 												"name" => "Thruster",
// 												"prop" => array (
// 														array (
// 																"type" => "Reps",
// 																"value" => 15
// 														),
// 														array (
// 																"type" => "Assist",
// 																"value" => 0.40
// 														),
// 														array (
// 																"type" => "Height",
// 																"value" => "40.55"
// 														)
// 												)
// 										),
// 										array (
// 												"name" => "Pistol",
// 												"prop" => array (
// 														array (
// 																"type" => "Reps",
// 																"value" => 15
// 														),
// 														array (
// 																"type" => "Weight",
// 																"value" => "60.70"
// 														),
// 														array (
// 																"type" => "Calories",
// 																"value" => "60"
// 														)
// 												)
// 										)
// 								)
// 						)
// 				)
				
// 			),
// 			array (
// 					"id" => 1,
// 					"athlete_name" => 'Marcio Valle',
// 					"average_volume" => "150.5",
// 					"average_fitness" => "50.2",
// 					"max_squat" => "113",
// 					"max_press" => "79",
// 					"max_deadlift" => "89",
			
// 					"WOD" => array (
// 							array (
// 									"date" => "1/20/2014",
// 									"name" => "Henry",
// 									"type" => "time",
// 									"value" => "20:00",
// 									"volume" => 78,
// 									"fitness" => 29,
// 									"exercises" => array (
			
// 											array (
// 													"name" => "Hand Stand Push Up",
// 													"prop" => array (
// 															array (
// 																	"type" => "Reps",
// 																	"value" => 12
// 															),
// 															array (
// 																	"type" => "Assist",
// 																	"value" => 0.15
// 															),
// 															array (
// 																	"type" => "Height",
// 																	"value" => "80.5"
// 															)
// 													)
// 											),
// 											array (
// 													"name" => "Pistol",
// 													"prop" => array (
// 															array (
// 																	"type" => "Reps",
// 																	"value" => 15
// 															),
// 															array (
// 																	"type" => "Weight",
// 																	"value" => "60.70"
// 															),
// 															array (
// 																	"type" => "Calories",
// 																	"value" => "60"
// 															)
// 													)
// 											)
// 									)
// 							),
			
// 							array (
// 									"date" => "1/17/2014",
// 									"name" => "Marcos",
// 									"type" => "reps",
// 									"value" => "45",
// 									"volume" => 69,
// 									"fitness" => 31,
// 									"exercises" => array (
			
// 											array (
// 													"name" => "Thruster",
// 													"prop" => array (
// 															array (
// 																	"type" => "Time",
// 																	"value" => '7:35'
// 															),
// 															array (
// 																	"type" => "Assist",
// 																	"value" => 0.40
// 															),
// 															array (
// 																	"type" => "Height",
// 																	"value" => "40.55"
// 															)
// 													)
// 											),
// 											array (
// 													"name" => "Pistol",
// 													"prop" => array (
// 															array (
// 																	"type" => "Time",
// 																	"value" => '8:40'
// 															),
// 															array (
// 																	"type" => "Weight",
// 																	"value" => "60.70"
// 															),
// 															array (
// 																	"type" => "Calories",
// 																	"value" => "60"
// 															)
// 													)
// 											)
// 									)
// 							)
// 					)
			
// 			)
// 		));
		
	
		
		
		
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
		/*$auth=Yii::app()->authManager; $bizRule='return !Yii::app()->user->isGuest;'; $auth->createRole('authenticated', 'authenticated user', $bizRule); $bizRule='return Yii::app()->user->isGuest;'; $auth->createRole('guest', 'guest user', $bizRule); $role = $auth->createRole('admin', 'administrator'); $auth->assign('admin',1);*/
		
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
				$this->redirect (Yii::app()->homeUrl.'/site/OverallStats'); //Yii::app ()->user->returnUrl );
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
}