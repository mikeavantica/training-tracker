<?php

class AthleteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','AthleteStats'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Athlete;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Athlete'])) {
			$model->attributes=$_POST['Athlete'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Athlete'])) {
			$model->attributes=$_POST['Athlete'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionAthleteStats(){
		date_default_timezone_get();
		$endDate = date("Y-m-d");
		$startDate= date('Y-m-d', strtotime('-10 day'));
		$this->layout = '';
		$model=$this->loadModel($_GET['id']);
		$athlete_stats = array (
		
				"id" => 1,
				"athlete_name" => $model->first_name.' '.$model->last_name,
				"average_volume" => "139.3",
				"average_fitness" => "31.8",
				"max_squat" => "225",
				"max_press" => "95",
				"max_deadlift" => "275",
		
				"WOD" => array (
						array (
								"date" => $startDate,
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
																"type" => "Calories",
																"value" => "30.20"
														)
												)
										),
										array (
												"name" => "Pistol",
												"prop" => array (
														array (
																"type" => "time",
																"value" => '20:10'
														),
														array (
																"type" => "Weight",
																"value" => "60.70"
														),
														
												)
										)
								)
						),
		
						array (
								"date" => $endDate,
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
																"value" => 45
														),
														array (
																"type" => "Assist",
																"value" => 0.20
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
																"type" => "time",
																"value" => '50:00'
														),
														array (
																"type" => "Weight",
																"value" => "80.10"
														),
														array (
																"type" => "Calories",
																"value" => "30"
														)
												)
										)
								)
						)
				)
		);
		
		$this->render ( 'athleteStat', array (
				'athlete_stats' => $athlete_stats
		) );
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Athlete');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Athlete('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Athlete'])) {
			$model->attributes=$_GET['Athlete'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Athlete the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Athlete::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Athlete $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='athlete-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}