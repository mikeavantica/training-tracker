<?php
/* @var $this WorkoutTypeController */
/* @var $model WorkoutType */
?>

<?php

$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				'Workout Types' => 'index',
				'Create'
		)
) );

$this->menu=array(
	
	array('label'=>'Manage WorkoutType', 'url'=>array('admin')),
);
?>

<h1>Create WorkoutType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>