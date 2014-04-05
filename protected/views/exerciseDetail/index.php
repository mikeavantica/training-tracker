<?php
/* @var $this ExerciseDetailController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Exercise Details',
);

$this->menu=array(
	array('label'=>'Create ExerciseDetail','url'=>array('create')),
	array('label'=>'Manage ExerciseDetail','url'=>array('admin')),
);
?>

<h1>Exercise Details</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>