<?php
/* @var $this WorkoutTypeController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Workout Types',
);

$this->menu=array(
array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create WorkoutType', 'url'=>array('create')),
array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage WorkoutType', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Workout Types') ?>
<?php $this->widget('bootstrap.widgets.BsListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>