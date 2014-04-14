<?php
/* @var $this WorkoutController */
/* @var $model Workout */



$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				'Workout' => 'admin',
				'Manage'
		)
) );

$this->menu=array(
	
	array('label'=>'Create Workout', 'url'=>array('view','id'=> 0)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#workout-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Workouts</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.BsGridView',array(
	'id'=>'workout-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'date',
		'name',
		'description',
		'workout_typeid',
		array(
			'class'=>'bootstrap.widgets.BsButtonColumn',
            'template'=> '{view},{delete}'
		),
	),
)); ?>