<?php
/* @var $this WorkoutController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Workout',

		)
) );

$this->menu=array(
	array('label'=>'Create Workout','url'=>array('create')),
	array('label'=>'Manage Workout','url'=>array('admin')),
);
?>

<h1>Workouts</h1>

<?php 
$this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'workout-grid',
		'dataProvider'=>$dataProvider,
		'columns'=>array(
				'id',
				'date',
				'name',
				'description',
				'workout_typeid',
				
		),
));

?>