<?php
/* @var $this WorkoutDetailController */
/* @var $model WorkoutDetail */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Workout' => Yii::app ()->homeUrl.'/Workout/index',
				'Create'
		)
) );

$this->menu=array(
	array('label'=>'List WorkoutDetail', 'url'=>array('index')),
	array('label'=>'Manage WorkoutDetail', 'url'=>array('admin')),
		
		
);
$model->workoutid = $_GET['id'];
?>

<h1>Create WorkoutDetail </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>