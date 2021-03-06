<?php

class WorkoutController extends Controller
{
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
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete' // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     *
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array(
                'allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array(
                    'index',
                    'view'
                ),
                'roles' => array(
                'admin', 'authenticated'
                )
            ),
            array(
                'allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array(
                    'create',
                    'update'
                ),
                'roles' => array(
                   'admin', 'authenticated'
                )
            ),
            array(
                'allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(
                    'admin',
                    'delete',
                    'CreateWorkout',
                    'LoadDetail',
                    'UpdateDetail'
                ),
                'roles' => array(
                    'admin', 'authenticated'
                )
            ),
            array(
                'deny', // deny all users
                'users' => array(
                    '*'
                )
            )
        );
    }

    public function actionUpdateDetail($id)
    {
        $this->layout = '';


        $modelSon = WorkoutDetail::model()->findByPk($id);

        if ($modelSon === null) {
            throw new CHttpException (404, 'The requested page does not exist.');
        }
        $modelFather = $this->loadModel($modelSon->workoutid);

        $criteria = new CDbCriteria ();
        $criteria->order = 'date DESC, id';
        $dataProvider = new CActiveDataProvider ('workout', array(
            'criteria' => $criteria
        ));
        $this->render('view', array(
            'model' => $modelFather,
            'modelDetail' => $modelSon,
            'dataProvider' => $dataProvider
        ));
    }

    /**
     * Displays a particular model.
     *
     * @param integer $id
     *            the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->layout = '';
        if ($id == 0) {
            $model = new Workout ();
            $model->date = date("Y-m-d");

        } else {
            $model = $this->loadModel($id);
        }

        $modelDetail = new WorkoutDetail ();
        $modelDetail->workoutid = $id;

        $criteria = new CDbCriteria ();
        $criteria->order = 'date DESC, id';
        $dataProvider = new CActiveDataProvider ('workout', array(
            'criteria' => $criteria
        ));
        $this->render('view', array(
            'model' => $model,
            'modelDetail' => $modelDetail,
            'dataProvider' => $dataProvider
        ));
    }

    public function actionCreateWorkout()
    {
        $model = new Workout ();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset ($_POST ['Workout'])) {
            $model->attributes = $_POST ['Workout'];

            $valid = $model->validate();
            if ($valid) {

                if ($model->save()) {
                    $this->redirect(array(
                        'view',
                        'id' => $model->id
                    ));
                }
            }
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Workout ();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset ($_POST ['Workout'])) {
            $model->attributes = $_POST ['Workout'];

            $valid = $model->validate();

            if ($valid) {
                if ($model->save()) {
                    $this->redirect(array(
                        'view',
                        'id' => $model->id
                    ));
                }
            } else {
                Yii::app()->user->setFlash('error', 'please fill the required fills');
                $this->redirect(array(
                    'view',
                    'id' => 0
                ));
            }
        }

        $this->render('create', array(
            'model' => $model
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *            the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset ($_POST ['Workout'])) {
            $model->attributes = $_POST ['Workout'];
            if ($model->save()) {
                $this->redirect(array(
                    'view',
                    'id' => 0
                ));
            }
        } else {
            $this->redirect(array(
                'view',
                'id' => $model->id
            ));
        }


    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     *
     * @param integer $id
     *            the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            WorkoutDetail::model()->deleteSons($id);
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset ($_GET ['ajax'])) {
                $this->redirect(array(
                    'view',
                    'id' => 0
                ));
            }
        } else {
            throw new CHttpException (400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider ('Workout');
        $this->render('index', array(
            'dataProvider' => $dataProvider
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Workout ('search');
        $model->unsetAttributes(); // clear any default values
        if (isset ($_GET ['Workout'])) {
            $model->attributes = $_GET ['Workout'];
        }

        $this->render('admin', array(
            'model' => $model
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     *
     * @param integer $id
     *            the ID of the model to be loaded
     * @return Workout the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Workout::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException (404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     *
     * @param Workout $model
     *            the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset ($_POST ['ajax']) && $_POST ['ajax'] === 'workout-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}