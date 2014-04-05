<?php
/* @var $this ExerciseDetailController */
/* @var $model ExerciseDetail */
?>

<?php
$this->breadcrumbs=array(
	'Exercise Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExerciseDetail', 'url'=>array('index')),
	array('label'=>'Create ExerciseDetail', 'url'=>array('create')),
	array('label'=>'View ExerciseDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ExerciseDetail', 'url'=>array('admin')),
);
?>

    <h1>Update ExerciseDetail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>