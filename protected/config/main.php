<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array (
		'basePath' => dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..',
		'name' => 'Training Tracker',
		
		'aliases' => array (
		
				'bootstrap' => realpath ( __DIR__ . '/../extensions/bootstrap' ),
				'chartjs' => realpath ( __DIR__. '/../extensions/yii-chartjs' ),
				'widget' => realpath ( __DIR__. '/../extensions/timepicker' ), // change this if necessary
		),
		
		
		
	
		
		// preloading 'log' component
		'preload' => array (
				'log', 'bootstrap' ,'chartjs'
		),
		
		// autoloading model and component classes
		'import' => array (
				'application.models.*',
				'application.components.*',
				'bootstrap.helpers.BsHtml',
				'bootstrap.helpers.BsArray',
				'bootstrap.behaviors.BsWidget',
				'bootstrap.widgets.*',
		
				
				
				
		),
		
		'modules' => array (
				'gii'=>array( 
						'class'=>'system.gii.GiiModule', 
						'password'=>'1', 
						'ipFilters'=>array('127.0.0.1','::1'), 
						'generatorPaths' => array (
 								'bootstrap.gii'
  						)
						),'auth' => array(
  'strictMode' => true, // when enabled authorization items cannot be assigned children of the same type.
  'userClass' => 'User', // the name of the user model class.
  'userIdColumn' => 'id', // the name of the user id column.
  'userNameColumn' => 'username', // the name of the user name column.
  'defaultLayout' => 'application.views.layouts.main', // the layout used by the module.
  'viewDir' => null, // the path to view files to use with this module.
),
						)  
		// uncomment the following to enable the Gii tool
		/*
		  'gii'=>array( 'class'=>'system.gii.GiiModule', 'password'=>'Enter Your Password Here', // If removed, Gii defaults to localhost only. Edit carefully to taste. 'ipFilters'=>array('127.0.0.1','::1'), ),
		 */
		,
		
		// application components
		'components' => array (
		'authManager' => array(    
			'class'=> 'auth.components.CachedDbAuthManager',
			'behaviors' => array(
				'auth' => array(
						'class' => 'auth.components.AuthBehavior',
				),
		),
		),
		        'chartjs' => array('class' => 'chartjs.components.ChartJs'),
		     
				'user' => array (
				'class' => 'auth.components.AuthWebUser',
				'admins' => array('admin', 'Jason', 'bar'), // users with full access
						// enable cookie-based authentication
						'allowAutoLogin' => true,
						'authTimeout' => 3600
				),
				'bootstrap' => array (
						'class' => 'bootstrap.components.BsApi',
						
				),
				// uncomment the following to enable URLs in path-format
				
				 'urlManager'=>array( 'urlFormat'=>'path', 'rules'=>array( '<controller:\w+>/<id:\d+>'=>'<controller>/view', '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>', '<controller:\w+>/<action:\w+>'=>'<controller>/<action>', ), ),
				 
			/*	'db' => array (
						'connectionString' => 'sqlite:' . dirname ( __FILE__ ) . '/../data/testdrive.db' 
				),*/
				// uncomment the following to use a MySQL database
				
				  'db'=>array( 'connectionString' => 'mysql:host=localhost;dbname=training_tracker', 'emulatePrepare' => true, 'username' => 'root', 'password' => 'betterwod', 'charset' => 'utf8', ),
				 
				'errorHandler' => array (
						// use 'site/error' action to display errors
						'errorAction' => 'site/error' 
				),
				'log' => array (
						'class' => 'CLogRouter',
						'routes' => array (
								array (
										'class' => 'CFileLogRoute',
										'levels' => 'error, warning' 
								) 
						// uncomment the following to show log messages on web pages
						/*
						 * array( 'class'=>'CWebLogRoute', ),
						 */
						 
				) 
		),
		
	
		// application-level parameters that can be accessed
		// using Yii::app()->params['paramName']
		'params' => array (
				// this is used in contact page
				'adminEmail' => 'jcarrigan@blackopsdev.com',
			   
		)),
		);