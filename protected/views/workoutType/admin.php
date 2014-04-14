<?php
/* @var $this WorkoutTypeController */
/* @var $model WorkoutType */



$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				'Workout Types' => 'index',
				'Manage'
		)
) );

$this->menu = array (
		array (
				'label' => 'Create WorkoutType',
				'url' => array (
						'create' 
				) 
		) 
);

Yii::app ()->clientScript->registerScript ( 'search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#workout-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
" );
?>

<h1>Manage Workout Types</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display: none">
<?php

$this->renderPartial ( '_search', array (
		'model' => $model 
) );
?>
</div>
<!-- search-form -->

<?php

$this->widget ( 'bootstrap.widgets.BsGridView', array (
		'id' => 'workout-type-grid',
		'dataProvider' => $model->search (),
		'filter' => $model,
		'columns' => array (
				//'id',
				'name',
				array (
						'class' => 'bootstrap.widgets.BsButtonColumn' 
				) 
		) 
) );
?>