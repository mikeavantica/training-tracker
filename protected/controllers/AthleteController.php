<?php
class AthleteController extends Controller {
	/**
	 *
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 *      using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';
	
	/**
	 *
	 * @return array action filters
	 */
	public function filters() {
		return array (
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete'  // we only allow deletion via POST request
				);
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * 
	 * @return array access control rules
	 */
	public function accessRules() {
		return array (
				array (
						'allow', // allow all users to perform 'index' and 'view' actions
						'actions' => array (
								'index',
								'view' 
						),
						'users' => array (
								'*' 
						) 
				),
				array (
						'allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions' => array (
								'create',
								'update' 
						),
						'users' => array (
								'@' 
						) 
				),
				array (
						'allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions' => array (
								'admin',
								'delete',
								'AthleteStats' 
						),
						'roles' => array (
								'admin',
								'authenticated' 
						) 
				),
				array (
						'deny', // deny all users
						'users' => array (
								'*' 
						) 
				) 
		);
	}
	
	/**
	 * Displays a particular model.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render ( 'view', array (
				'model' => $this->loadModel ( $id ) 
		) );
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Athlete ();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Athlete'] )) {
			$model->attributes = $_POST ['Athlete'];
			if($model->validate()){
			if ($model->save ()) {
				$this->redirect ( array (
						'admin' 
				) );
			} else {
				
				Yii::app ()->user->setFlash ( 'error', 'please fill the required fills' );
				$this->redirect ( array (
						'admin' 
				) );
			}
		}else{
			Yii::app ()->user->setFlash ( 'error', 'incorrect Email' );
			$this->redirect ( array (
					'admin'
			) );
		}
		
		}
		
		// $this->render('admin');
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$this->layout = "";
		$add = $this->loadModel ( $id );
		$model = new Athlete ();
		$model = new Athlete ( 'search' );
		$model->unsetAttributes (); // clear any default values
		                           
		// Uncomment the following line if AJAX validation is needed
		                           // $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Athlete'] )) {
			$add->attributes = $_POST ['Athlete'];
			if ($add->save ()) {
				$this->redirect ( array (
						'admin' 
				) );
			}
		}
		
		$this->render ( 'admin', array (
				'add' => $add,
				'model' => $model 
		) );
	}
	public function actionAthleteStats() {
		date_default_timezone_get ();
		$startDate = date ( "Y-m-1" );
		$endDate = date ( "Y-m-d", strtotime ( "+1 month", strtotime ( $startDate ) ) );
		$endDate = date ( "Y-m-d", strtotime ( "-1 day", strtotime ( $endDate ) ) );
		
		$this->layout = '';
		$model = $this->loadModel ( $_GET ['id'] );
		
		$athlete_stats = Athlete::model ()->getStats ( $model->id, $startDate, $endDate );
		
		$this->render ( 'athleteStat', array (
				'athlete_stats' => $athlete_stats 
		) );
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		if (Yii::app ()->request->isPostRequest) {
			
			// we only allow deletion via POST request
			Athlete::model()->deleteRecordDataByAthlete($id);
			$this->loadModel ( $id )->delete ();
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (! isset ( $_GET ['ajax'] )) {
				$this->redirect ( isset ( $_POST ['returnUrl'] ) ? $_POST ['returnUrl'] : array (
						'admin' 
				) );
			}
		} else {
			throw new CHttpException ( 400, 'Invalid request. Please do not repeat this request again.' );
		}
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider ( 'Athlete' );
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider 
		) );
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$this->layout = "";
		$add = new Athlete ();
		$model = new Athlete ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['Athlete'] )) {
			$model->attributes = $_GET ['Athlete'];
		}
		
		$this->render ( 'admin', array (
				'model' => $model,
				'add' => $add 
		) );
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be loaded
	 * @return Athlete the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Athlete::model ()->findByPk ( $id );
		if ($model === null) {
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		}
		return $model;
	}
	
	/**
	 * Performs the AJAX validation.
	 * 
	 * @param Athlete $model
	 *        	the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'athlete-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}
}