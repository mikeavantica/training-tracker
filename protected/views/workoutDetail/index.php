<?php
/* @var $this WorkoutDetailController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Workout Details',
);

$this->menu=array(
	array('label'=>'Create WorkoutDetail','url'=>array('create')),
	array('label'=>'Manage WorkoutDetail','url'=>array('admin')),
);
?>

<h1>Workout Details</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>