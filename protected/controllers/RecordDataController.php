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
                'actions' => array('create', 'update','populateWOD'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'roles' => array('admin','authenticated'),
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
        
        $criteria = new CDbCriteria();
        $criteria->group = 'athleteid, date';
        $criteria->order = 'date DESC, athleteid';
        $dataProvider = new CActiveDataProvider('RecordData', array(
            'criteria' => $criteria
        ));
        
        if (array_key_exists('action', $_POST)) {
            $action = $_POST['action'];
            if ($action == 'edit') {
                $models = $this->createRecordData();
                $model = new RecordData;
                if ($models!=null)
                {
                    $model = $models[0];
                    $is_update = true;
                    $this->render('index', array(
                              'dataProvider' => $dataProvider,
                                'model' => $model,
                                'models' => $models,
                                'is_update' =>$is_update,
                                ));
                    return;
                }
                
                $this->redirect('index');
                return;
            }
        }
               
        
        
        
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
        $is_update = true;
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
            'models' => $models,
            'is_update' =>$is_update,
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
        $models = $this->createRecordData();
       
        $criteria = new CDbCriteria();
        $criteria->group = 'athleteid, date';
        $criteria->order = 'date DESC, athleteid';
        $dataProvider = new CActiveDataProvider('RecordData', array(
            'criteria' => $criteria
        ));
        
        $is_update = true;
        
        $model = new RecordData;
        if ($models!=null)
        {
            $model = $models[0];
            $is_update = null;
        }
        else
        {
            if (isset($_POST['wod']))
            {   
                $criteria = new CDbCriteria();
                $criteria->condition = "workoutid =:workoutid";
                $criteria->params = array(':workoutid' => $_POST["wod"]);
                $workoutDetails = WorkoutDetail::model()->with('workout.workoutType','exercise')->findAll($criteria);
                
                //$recordData = new RecordData;
                $models= array();
                foreach ($workoutDetails as $wodetail) {
                    $recordData = new RecordData;
                    $recordData->workoutDetail = $wodetail;
                    $recordData->workout_detailid= $wodetail->id;
                    $recordData->workoutDetail->exercise = $wodetail->exercise;
                    array_push($models, $recordData);
                }
                $is_update = null;
                $model = $models[0];
                
               // var_dump($model->workoutDetail->exercise);return;
            }
            
            $model->date = date("Y-m-d");
        }
        
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
            'models'=>$models,
            'is_update' =>$is_update,
        ));
    }
    
    private function createRecordData() {
    	
          if (isset($_POST['RecordData'])) {
            $total_workdetails = 0;
            $recordDatas = array();
            $correct = true;
            $flag_updating = false;
            
            if (isset($_POST['total_workdetails']))
            {
                $total_workdetails = $_POST['total_workdetails'];
            }
           
            for ($i = 0; $i < $total_workdetails; $i++) {
                $work = 'WorkoutDetails' . $i;

                $model = new RecordData;
                $model->attributes = $_POST['RecordData'];
                if (array_key_exists($work, $_POST)) {
                    $work_array = $_POST[$work];
                    if (array_key_exists('recorddataid', $work_array))
                    {
                        $model = RecordData::model()->findByPk($work_array['recorddataid']);
                        $flag_updating = true;
                    }
                    
                    $time = explode(':', $_POST["RecordData"]["time"]);
                    $model->time = $time[0].':'.$time[1];
                    $model->date = $_POST["RecordData"]["date"];
                    $model->weight = (array_key_exists('weight', $work_array) ? $work_array['weight'] : 0);
                    $model->height = (array_key_exists('height', $work_array) ? $work_array['height'] : 0);
                    $model->assist = (array_key_exists('assist', $work_array) ? $work_array['assist'] : 0);
                    $model->calories = (array_key_exists('calories', $work_array) ? $work_array['calories'] : 0);
                    $model->reps = (array_key_exists('reps', $work_array) ? $work_array['reps'] : 0);
                    $model->workout_detailid = $work_array['id'];
                }
                
                $correct &= $model->validate();
                array_push($recordDatas, $model);
            }
            
            if($correct)
            { 
            	
                // validate if record already exists
                if (!$flag_updating) {
                    $criteria = new CDbCriteria();
                    $criteria->condition = "athleteid = :athleteid and date = :date";
                    $criteria->params = array(':athleteid' => $_POST["RecordData"]["athleteid"], ':date' => $_POST["RecordData"]["date"]);
                    $existingRecords = RecordData::model()->findAll($criteria);
                   
                    if (count($existingRecords) > 0) {
                    	Yii::app()->user->setFlash('error', 'Record already exist');
                        $this->redirect(array('index'));
                        //RecordData::model()->addError('athleteid', 'This already exist.');
                      // return null;
                    }
                }
                
                foreach ($recordDatas as $record) {
                    // fix time to take minutes:
                    $t = explode(':', $record->time);
                    $f = "00:" . $t[0] . ":" . $t[1];
                    $time = $f;
                    $record->time = $time;
                    // print_r($record);
                    $record->save();
                }
                if ($total_workdetails==0)
                {
                    $model = new RecordData;
                    $model->attributes = $_POST['RecordData'];
                    $model->weight = 0;
                    $model->height = 0;
                    $model->assist = 0;
                    $model->calories = 0;
                    $model->reps = 0;
                    $model->workout_detailid = null;
                    $model->workoutDetail = new WorkoutDetail;
                    $model->workoutDetail->exercise = new Exercise;
                    $model->workoutDetail->workout = new Workout;
                    $model->workoutDetail->workout->workoutType = new WorkoutType;
                    $model->validate();


                    array_push($recordDatas, $model);

                } else {
                   return null;
                }
            }
            return $recordDatas;
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
        
        $this->renderPartial('_form2', $data, false, false);
    }

}
