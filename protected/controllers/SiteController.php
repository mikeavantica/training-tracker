<?php

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public $defaultAction = 'Login';

    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction'
            )
        );
    }
 
    
    

    public function actionOverallStats()
    {  
    	if(Yii::app()->user->checkAccess('admin')|| Yii::app()->user->checkAccess('authenticated')){

        date_default_timezone_get();
        $endDate = date("Y-m-d");
        $startDate = date("Y-m-d", strtotime("-1 month", strtotime($endDate)));

        $athlete_stats = Athlete::model()->getOverallStats($startDate, $endDate);


        $this->render('overallstats', array(
            'athlete_stats' => $athlete_stats
        ));
    	}else{
    	
    		$this->redirect('Contact');
    		
    	}
    	
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $this->render('index');

      
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error ['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model = new ContactForm ();
        if (isset ($_POST ['ContactForm'])) {
            $model->attributes = $_POST ['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" . "Reply-To: {$model->email}\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params ['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array(
            'model' => $model
        ));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {  
    	
    	$auth = Yii::app()->authManager;
    	
    	if (!$auth->isAssigned("admin", 22)) {
    		$bizRule = 'return !Yii::app()->user->isGuest;';
    		$auth->createRole('authenticated', 'authenticated user', $bizRule);
    		$bizRule = 'return Yii::app()->user->isGuest;';
    		$auth->createRole('guest', 'guest user', $bizRule);
    		$auth->createRole('admin', 'administrator');
    		$auth->assign('admin', 22);
    	}

       

        if (Yii::app()->user->isGuest) {
            $model = new LoginForm ();

            // if it is ajax validation request
            if (isset ($_POST ['ajax']) && $_POST ['ajax'] === 'login-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            // collect user input data
            if (isset ($_POST ['LoginForm'])) {
                $model->attributes = $_POST ['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if ($model->validate() && $model->login())
                    $this->redirect(Yii::app()->homeUrl . '/site/OverallStats'); //Yii::app ()->user->returnUrl );
            }
            // display the login form
            $this->render('login', array(
                'model' => $model
            ));
        } else {
            $this->redirect(Yii::app()->homeUrl . '/site/OverallStats');
        }
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}