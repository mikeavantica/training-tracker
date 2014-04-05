<?php
/* @var $this WorkoutController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Workouts',
);

$this->menu=array(
	array('label'=>'Create Workout','url'=>array('create')),
	array('label'=>'Manage Workout','url'=>array('admin')),
);
?>

<h1>Workouts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>