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

	<div class="frame">

		<!--  <div id="header">
		<div id="logo"><?php //echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->


		<div class="sidebar">
		<div>
		<!-- Replace the src of the image with your logo -->
		<ul class="nav  nav-list">
		<?php
		
		$this->widget ( 'bootstrap.widgets.BsNavbar', array (
				'brandLabel' => CHtml::encode ( Yii::app ()->name ),
				'collapse' => true,
				'items' => array (
						array (
								'class' => 'bootstrap.widgets.BsNav',
								'type' => 'navlist',
								'encodeLabel' => false,
								'items' => array (
										array (
												'label' => 'Home',
												'url' => Yii::app ()->homeUrl ,
												'visible' => Yii::app ()->user->checkAccess ( 'admin' ) || Yii::app ()->user->checkAccess ( 'authenticated' )
												
										),
										array (
												'label' => BsHtml::tag('img',array('src'=>Yii::app()->baseUrl.'/images/u21_normal.png')).'View Dashboard',
												'url' => Yii::app ()->homeUrl . '/site/Overallstats',
												'visible' => Yii::app ()->user->checkAccess ( 'admin' ) || Yii::app ()->user->checkAccess ( 'authenticated' )
										),
										array (
												'label' => BsHtml::tag('img',array('src'=>Yii::app()->baseUrl.'/images/u29_normal.png')).'Add New WOD',
												'url' => array (
														'/Workout/view','id'=>0
												),
												'visible' => Yii::app ()->user->checkAccess ( 'admin' ) || Yii::app ()->user->checkAccess ( 'authenticated' )
										),
										array (
												'label' => BsHtml::tag('img',array('src'=>Yii::app()->baseUrl.'/images/u24_normal.png')).'Record Athlete Data',
												'url' => array (
														'/RecordData/index'
												),
												'visible' => Yii::app ()->user->checkAccess ( 'admin' ) || Yii::app ()->user->checkAccess ( 'authenticated' )
										),
										array (
												'label' => BsHtml::tag('img',array('src'=>Yii::app()->baseUrl.'/images/u18_normal.png')).'Create New Athlete',
												'url' => array (
														'/Athlete/admin' 
												),
												'visible' => Yii::app ()->user->checkAccess ( 'admin' ) || Yii::app ()->user->checkAccess ( 'authenticated' )
										),
										array (
												'label' => 'Configuration',
												'items' => array (
														array (
																'label' => 'Users',
																'url' => array (
																		'/User/admin' 
																) 
														),
														array (
																'label' => 'Roles',
																'url' => array (
																		'/auth/Assignment' 
																) 
														),
														array (
																'label' => 'Workout Type',
																'url' => array (
																		'/WorkoutType/admin' 
																) 
														),
														
														array (
																'label' => 'Body Profiles',
																'url' => array (
																		'/BodyProfiles/admin' 
																) 
														),
														array (
																'label' => 'Exercises',
																'url' => array (
																		'/Exercise/admin'
																)
														),
														array (
																'label' => 'Exercises Details',
																'url' => array (
																		'/ExerciseDetail/admin' 
																) 
														) 
												),
												
												'visible' => Yii::app ()->user->checkAccess ( 'admin' ) 
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
		</ul>
		</div>
	</div>
	
	<div class="content">
		<div class="navbar">
			<a href="#" onclick="return false;" class="btn pull-left toggle-sidebar "><i class="fa fa-list"></i></a>
			<div class="right">
				<ul class="navbar-nav user-menu pull-right">
					<li class="dropdown user-name">
						<a class="dropdown-toggle" data-toggle="dropdown"><?php if(Yii::app()->user->isGuest){ echo "Login"; } else { echo Yii::app()->user->name;} ?></a>
						<ul class="dropdown-menu right inbox user">
						<?php $this->widget ( 'bootstrap.widgets.BsNavbar', array (
							'brandLabel' => CHtml::encode ( Yii::app ()->name ),
							'collapse' => true,
							'items' => array (
									array (
											'class' => 'bootstrap.widgets.BsNav',
											'type' => 'navbar',
											'items' => array (
												array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
												array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
											)
									)
							)
						  )
						)
						?>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- / Navbar-->
		<div class="main-content">
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
		</div>
	</div>
	<div class="clear"></div>

		<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by BetterWod.<br /> All
			Rights Reserved.<br />
		<?php //echo Yii::powered(); ?>
		<?php //Yii::app()->bootstrap->register(); //method register() and registerCoreCss() don't longer exist in BsApi.php, so the lines below include javascript and style files?> 
		<?php //echo Yii::app()->bootstrap->registerCoreCss(); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->bootstrap->getAssetsUrl().'/css/bootstrap.min.css', ''); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->bootstrap->getAssetsUrl().'/css/bootstrap-theme.min.css', ''); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/themes/themeforest/css/archon.css', ''); ?>
		<?php //Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/themes/themeforest/css/responsive.css', ''); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/tracker.css', ''); ?>
		<?php 
		/** @var CClientScript $cs */
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerScriptFile(Yii::app()->bootstrap->getAssetsUrl().'/js/bootstrap.min.js', CClientScript::POS_END);
		?>
	</div>
		<!-- footer -->

	</div>
	<!-- page -->

</body>
</html>
