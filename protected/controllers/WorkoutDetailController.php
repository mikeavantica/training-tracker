<?php

class WorkoutDetailController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

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
				'actions'=>array('admin','delete','noRepeatExercise'),
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
	public function actionCreate2()
	{
		$model=new WorkoutDetail;
       
       	
     
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['WorkoutDetail'])) {
			$model->attributes=$_POST['WorkoutDetail'];
			
			if ($model->save()) {
				$this->redirect(array('Workout/view','id'=>$model->workoutid));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model=new WorkoutDetail;
		
		 
	
		 
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if (isset($_POST['WorkoutDetail'])) {
			$model->attributes=$_POST['WorkoutDetail'];
			if($model->total_time != ''){
				$time = explode(':', $model->total_time);
				$model->total_time = '00:'.$time[0].':'.$time[1];
			}
			if ($model->save()) {
				
				$this->redirect(array('Workout/view','id'=>$model->workoutid));
			}
		}
	
	             $this->redirect(array('Workout/view','id'=>$model->workoutid));
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
        
		if (isset($_POST['WorkoutDetail'])) {
			$model->attributes=$_POST['WorkoutDetail'];
			if ($model->save()) {
				//$this->redirect(array('view','id'=>$model->id));
				$this->redirect(array('Workout/view','id'=>$model->workoutid));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
		$dataProvider=new CActiveDataProvider('WorkoutDetail');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new WorkoutDetail('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['WorkoutDetail'])) {
			$model->attributes=$_GET['WorkoutDetail'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return WorkoutDetail the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=WorkoutDetail::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}
	public function actionnoRepeatExercise()
	{  
		$rows = WorkoutDetail::model()->CheckExercise($_GET['id'], $_GET['exercise']);
		echo CJSON::encode(array(
		 'id'=> $rows	 
		));
	}

	/**
	 * Performs the AJAX validation.
	 * @param WorkoutDetail $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='workout-detail-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}