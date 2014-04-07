<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<!-- blueprint CSS framework -->
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
	media="screen, projection" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
	media="print" />
<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div class="container">

		<!--  <div id="header">
		<div id="logo"><?php //echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->


		<div>
		<?php
		
		$this->widget ( 'bootstrap.widgets.TbNavbar', array (
				'brandLabel' => CHtml::encode ( Yii::app ()->name ),
				'display' => null, // default is static to top
				'collapse' => true,
				'items' => array (
						array (
								'class' => 'bootstrap.widgets.TbNav',
								'items' => array (
										array (
												'label' => 'Home',
												'url' => Yii::app ()->homeUrl 
										),
										array (
												'label' => 'Athlete',
												'url' => array (
														'/Athlete/index' 
												),
												'visible' => ! Yii::app ()->user->isGuest 
										),
										
										array (
												'label' => 'Configuration',
												'items' => array (
														array (
																'label' => 'Manage Users',
																'url' => array (
																		'/User/Index' 
																) 
														),
														array (
																'label' => 'Manage Roles',
																'url' => array (
																		'/auth/Assignment' 
																) 
														),
														array (
																'label' => 'Manage WorkOut',
																'url' => array (
																		'/Workout/index' 
																) 
														),
														array (
																'label' => 'Manage Workout Type',
																'url' => array (
																		'/WorkoutType/index' 
																) 
														),
														array (
																'label' => 'Manage Exercises',
																'url' => array (
																		'/Exercise/index' 
																) 
														),
														array (
																'label' => 'Manage Body Profiles',
																'url' => array (
																		'/BodyProfiles/index' 
																) 
														),
														array (
																'label' => 'Manage Exercises Detail',
																'url' => array (
																		'/ExerciseDetail/index' 
																) 
														) 
												),
												
												'visible' => Yii::app ()->user->checkAccess ( 'admin' ) 
										),
										array (
												'label' => 'Login',
												'url' => array (
														'/site/login' 
												),
												'visible' => Yii::app ()->user->isGuest 
										),
										array (
												'label' => 'Logout (' . Yii::app ()->user->name . ')',
												'url' => array (
														'/site/logout' 
												),
												'visible' => ! Yii::app ()->user->isGuest 
										) 
								) 
						) 
				) 
		) );
		/*
		 * bootstrap.widgets.TbNavbar(array( array('label' => 'Home', 'url' => '#'), array('label' => 'Athlete','url' =>array('/Athlete/index'), 'visible'=> !Yii::app()->user->isGuest), array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest), array('label' => 'Logout ('.Yii::app()->user->name.')','url'=> array('site/logout'),'visible'=> !Yii::app()->user->isGuest), ));
		 */
		/* $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/Athlete/index')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); */?>
	</div>
		<!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php
		
		$this->widget ( 'zii.widgets.CBreadcrumbs', array (
				'links' => $this->breadcrumbs 
		) );
		?>
		<!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

		<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br /> All
			Rights Reserved.<br />
		<?php echo Yii::powered(); ?>
		<?php Yii::app()->bootstrap->register(); ?>
		<?php echo Yii::app()->bootstrap->registerCoreCss(); ?>
	</div>
		<!-- footer -->

	</div>
	<!-- page -->

</body>
</html>
