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

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

	<div class="frame">
		<div class="sidebar">
		<div>
		<ul class="nav nav-list">
		<?php
		$this->widget ( 'bootstrap.widgets.BsNavbar', array (
				'brandLabel' => CHtml::encode ( Yii::app ()->name ),
				'collapse' => false,
				'items' => array (
						array (
								'class' => 'bootstrap.widgets.BsNav',
								'type' => 'navlist',
								'encodeLabel' => false,
								'items' => array (
										array (
												'label' => BsHtml::tag('img',array('src'=>Yii::app()->baseUrl.'/images/view-dashboard.png')).'View Dashboard',
												'url' => Yii::app ()->homeUrl . '/site/Overallstats',
												'visible' => Yii::app ()->user->checkAccess ( 'admin' ) || Yii::app ()->user->checkAccess ( 'authenticated' )
										),
										array (
												'label' => BsHtml::tag('img',array('src'=>Yii::app()->baseUrl.'/images/manage-workouts.png')).'Manage Workouts',
												'url' => array (
														'/Workout/view','id'=>0
												),
												'visible' => Yii::app ()->user->checkAccess ( 'admin' ) || Yii::app ()->user->checkAccess ( 'authenticated' )
										),
										array (
												'label' => BsHtml::tag('img',array('src'=>Yii::app()->baseUrl.'/images/record-workout-data.png')).'Record Workout Data',
												'url' => array (
														'/RecordData/index'
												),
												'visible' => Yii::app ()->user->checkAccess ( 'admin' ) || Yii::app ()->user->checkAccess ( 'authenticated' )
										),
										array (
												'label' => BsHtml::tag('img',array('src'=>Yii::app()->baseUrl.'/images/manage-athletes.png')).'Manage Athletes',
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
		) );?>
		</ul>
		</div>
	</div>
	
	<div class="content">
		<div class="navbar">
			<a href="#" onclick="return false;" class="btn pull-left toggle-sidebar"><i class="fa fa-list"></i></a>
			<div class="right">
				<ul class="navCustom navbar-nav user-menu pull-right">
					<li class="dropdown hidden-xs">
						<?php if(!Yii::app()->user->isGuest):?>
							<a class="dropdown-toggle" data-toggle="dropdown"><?php echo Yii::app()->user->name; ?></a>
						<?php endif;?>
						<ul class="dropdown-menu right inbox user">
						<?php $this->widget ( 'bootstrap.widgets.BsNavbar', array (
							'brandLabel' => CHtml::encode ( Yii::app ()->name ),
							'collapse' => true,
							'items' => array (
									array (
											'class' => 'bootstrap.widgets.BsNav',
											'type' => 'navbar',
											'items' => array (
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
		<div id="main-content">
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
		<!-- footer -->

		<div id="footer" class="row footer">
		Copyright &copy; <?php echo date('Y'); ?> by BetterWod.<br /> All
			Rights Reserved.<br />
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->bootstrap->getAssetsUrl().'/css/bootstrap.min.css', ''); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->bootstrap->getAssetsUrl().'/css/bootstrap-theme.min.css', ''); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/themes/themeforest/css/archon.css', ''); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/themes/themeforest/css/responsive.css', ''); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/tracker.css', ''); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/main.css', ''); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/form.css', ''); ?>
		<?php 
		/** @var CClientScript $cs */
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerScriptFile(Yii::app()->bootstrap->getAssetsUrl().'/js/bootstrap.min.js', CClientScript::POS_END);
		
		/* Load JS here for greater good */
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/jquery-ui-1.10.3.custom.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/jquery.ui.touch-punch.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/bootstrap-select.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/bootstrap-switch.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/jquery.tagsinput.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/jquery.placeholder.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/jquery.tagsinput.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/bootstrap-typeahead.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/application.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/moment.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/jquery.dataTables.min.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/jquery.sortable.js', CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/jquery.gritter.js', CClientScript::POS_END);
		/*Archon JS */
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/archon.js', CClientScript::POS_END);
		/*Datepicker*/
		$cs->registerScriptFile(Yii::app()->baseUrl.'/themes/themeforest/js/bootstrap-datetimepicker.js', CClientScript::POS_END);
		?>
	</div>
	</div>
	<!-- page -->

</body>
</html>
