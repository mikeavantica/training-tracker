<?php
/* @var $this WorkoutDetailController */
/* @var $model WorkoutDetail */
?>

<?php
$this->breadcrumbs=array(
	'Workout Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WorkoutDetail', 'url'=>array('index')),
	array('label'=>'Manage WorkoutDetail', 'url'=>array('admin')),
);
?>

<h1>Create WorkoutDetail</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>