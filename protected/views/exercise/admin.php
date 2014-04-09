<?php
/* @var $this ExerciseController */
/* @var $model Exercise */


$this->breadcrumbs=array(
	'Exercises'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Exercise', 'url'=>array('index')),
	array('label'=>'Create Exercise', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#exercise-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Exercises</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'exercise-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>