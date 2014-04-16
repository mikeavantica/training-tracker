<?php
/* @var $this ExerciseDetailController */
/* @var $model ExerciseDetail */



$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				'Exercise Details' => 'index',
				'Manage'
		)
) );

$this->menu = array (
		array (
				'label' => 'Create Exercises Details',
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
	$('#exercise-detail-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
" );
?>

<h1>Manage Exercise Details</h1>



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
		'id' => 'exercise-detail-grid',
		'dataProvider' => $model->search (),
		'filter' => $model,
		'columns' => array (
				array (
						'name' => 'body_profilesId',
						'value' => 'BodyProfiles::model()->FindByPk($data->body_profilesId)->body_part__name' 
				),
				array (
						'name' => 'exerciseid',
						'value' => 'Exercise::model()->FindByPk($data->exerciseid)->name',
                                                
				),
                //'body_profilesId',
               // 'exerciseid',
				'attr1',
				'attr2',
				'attr3',
				'attr4',
				'attr5',
				
				'attr6',
				'attr7',
				
				array (
						'class' => 'bootstrap.widgets.BsButtonColumn',
                                                'htmlOptions' =>array('width'=>'75px'),
				) 
		) 
) );
?>