<?php
/* @var $this ExerciseDetailController */
/* @var $model ExerciseDetail */
?>

<?php
$this->breadcrumbs=array(
	'Exercise Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Exercises Details', 'url'=>array('admin')),
);
?>

<h1>Create ExerciseDetail</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>