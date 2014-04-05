<?php
/* @var $this WorkoutTypeController */
/* @var $model WorkoutType */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Workout Types' => 'index',
				'Create'
		)
) );

$this->menu=array(
	array('label'=>'List WorkoutType', 'url'=>array('index')),
	array('label'=>'Manage WorkoutType', 'url'=>array('admin')),
);
?>

<h1>Create WorkoutType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>