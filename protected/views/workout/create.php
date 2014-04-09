<?php
/* @var $this WorkoutController */
/* @var $model Workout */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Workouts' => 'index',
				'Create'
		)
) );

$this->menu=array(
	
	array('label'=>'Manage Workout', 'url'=>array('admin')),
);
?>

<h1>Create Workout</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>