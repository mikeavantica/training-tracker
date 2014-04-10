<?php

class RecordDataController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'populateWOD'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'roles' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['RecordData'])) {
            $total_workdetails = $_POST['total_workdetails'];

            for ($i = 0; $i < $total_workdetails; $i++) {
                $work = 'WorkoutDetails' . $i;

                $model = new RecordData;
                $model->attributes = $_POST['RecordData'];
                if (array_key_exists($work, $_POST)) {
                    $work_array = $_POST[$work];
                    $model->weight = (array_key_exists('weight', $work_array) ? $work_array['weight'] : 0);
                    $model->height = (array_key_exists('height', $work_array) ? $work_array['height'] : 0);
                    $model->assist = (array_key_exists('assist', $work_array) ? $work_array['assist'] : 0);
                    $model->calories = (array_key_exists('calories', $work_array) ? $work_array['calories'] : 0);
                    $model->reps = 0;
                    $model->workout_detailid = $work_array['id'];
                }

                $model->save();

                var_dump($model);
            }

            //$this->redirect(array('view','id'=>$model->id));
        } else {
            $model = new RecordData;

            $this->render('create', array(
                'model' => $model,
            ));
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($athleteid, $date) {
        if (array_key_exists('action', $_POST)) {
            $action = $_POST['action'];
            if ($action == 'edit') {
                $total_workdetails = $_POST['total_workdetails'];
                for($i=0; $i<$total_workdetails; $i++) {
                    $work = 'WorkoutDetails' . $i;
                    $work_array = $_POST[$work];
                    $record = RecordData::model()->findByPk($work_array['recorddataid']);
                    $record->date = $_POST["RecordData"]["date"];
                    $record->time = $_POST["RecordData"]["time"];
                    $record->weight = (array_key_exists('weight', $work_array) ? $work_array['weight'] : 0);
                    $record->height = (array_key_exists('height', $work_array) ? $work_array['height'] : 0);
                    $record->assist = (array_key_exists('assist', $work_array) ? $work_array['assist'] : 0);
                    $record->calories = (array_key_exists('calories', $work_array) ? $work_array['calories'] : 0);
                    $record->reps = $_POST["RecordData"]["reps"];
                    $record->workout_detailid = $work_array['id'];
                    $record->save();
                }
                
                $this->redirect('index');
                return;
            }
        }
               
        
        $criteria = new CDbCriteria();
        $criteria->group = 'athleteid, date';
        $dataProvider = new CActiveDataProvider('RecordData', array(
            'criteria' => $criteria
        ));
        
        
        if (isset($_POST['RecordData'])) {
            $total_workdetails = $_POST['total_workdetails'];

            for ($i = 0; $i < $total_workdetails; $i++) {
                $work = 'WorkoutDetails' . $i;

                $model = new RecordData;
                $model->attributes = $_POST['RecordData'];
                if (array_key_exists($work, $_POST)) {
                    $work_array = $_POST[$work];
                    $model->weight = (array_key_exists('weight', $work_array) ? $work_array['weight'] : 0);
                    $model->height = (array_key_exists('height', $work_array) ? $work_array['height'] : 0);
                    $model->assist = (array_key_exists('assist', $work_array) ? $work_array['assist'] : 0);
                    $model->calories = (array_key_exists('calories', $work_array) ? $work_array['calories'] : 0);
                    $model->reps = 0;
                    $model->workout_detailid = $work_array['id'];
                }

                $model->save();
            }
        }
        
        $criteria = new CDbCriteria();
        $criteria->condition = "athleteid =:athleteid and date = :date";
        $criteria->params = array(':athleteid' => $athleteid, ':date' => $date);
        $models = RecordData::model()->with('workoutDetail','workoutDetail.exercise')->findAll($criteria);
        
        $model = $models[0];
        
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
            'models' => $models,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
       if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $sample = $this->loadModel($id);
            $criteria = new CDbCriteria();
            $criteria->condition = "athleteid =:athleteid and date = :date";
            $criteria->params = array(':athleteid' => $sample->athleteid, ':date' => $sample->date);
            RecordData::model()->deleteAll($criteria);

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->createRecordData();
        
        $criteria = new CDbCriteria();
        $criteria->group = 'athleteid, date';
        $dataProvider = new CActiveDataProvider('RecordData', array(
            'criteria' => $criteria
        ));
        
        $model = new RecordData;
        
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }
    
    private function createRecordData() {
        if (isset($_POST['RecordData'])) {
            $total_workdetails = $_POST['total_workdetails'];

            for ($i = 0; $i < $total_workdetails; $i++) {
                $work = 'WorkoutDetails' . $i;

                $model = new RecordData;
                $model->attributes = $_POST['RecordData'];
                if (array_key_exists($work, $_POST)) {
                    $work_array = $_POST[$work];
                    $model->weight = (array_key_exists('weight', $work_array) ? $work_array['weight'] : 0);
                    $model->height = (array_key_exists('height', $work_array) ? $work_array['height'] : 0);
                    $model->assist = (array_key_exists('assist', $work_array) ? $work_array['assist'] : 0);
                    $model->calories = (array_key_exists('calories', $work_array) ? $work_array['calories'] : 0);
                    //$model->reps = 0;
                    $model->workout_detailid = $work_array['id'];
                }
                $model->save();
            }
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new RecordData('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['RecordData'])) {
            $model->attributes = $_GET['RecordData'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return RecordData the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = RecordData::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param RecordData $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'record-data-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionPopulateWOD($id) {
        $data = array();
        $data["myValue"] = "Content updated in AJAX";

        $workout = Workout::model()->with('workoutType', 'workoutDetails.exercise')->findByPk($id);
        $data['workout'] = $workout;

        $this->renderPartial('_form2', $data, false, true);
    }

}
