<?php
/* @var $this WorkoutTypeController */
/* @var $model WorkoutType */
?>

<?php
$this->breadcrumbs=array(
	'Workout Types'=>array('index'),
	$model->name,
);

$this->menu=array(
array('icon' => 'glyphicon glyphicon-list','label'=>'List WorkoutType', 'url'=>array('index')),
array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create WorkoutType', 'url'=>array('create')),
array('icon' => 'glyphicon glyphicon-edit','label'=>'Update WorkoutType', 'url'=>array('update', 'id'=>$model->id)),
array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete WorkoutType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage WorkoutType', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','WorkoutType '.$model->id) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
'htmlOptions' => array(
'class' => 'table table-striped table-condensed table-hover',
),
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
),
)); ?>