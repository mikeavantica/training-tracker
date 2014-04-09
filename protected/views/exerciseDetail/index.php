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

<?php 
$this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'exercise-detail-grid',
		'dataProvider'=>$dataProvider,
		'columns'=>array(
				'id',
				'attr1',
				'attr2',
				'attr3',
				'attr4',
				'attr5',

				'attr6',
				'attr7',
				array (
						'name' => 'body_profilesId',
						// 'value'=>'$data->customers->FirstNameB',
						//'filter' => CHtml::listData ( Athlete::model ()->findAll (), 'id', 'first_name' ),
						'value' => 'BodyProfiles::model()->FindByPk($data->body_profilesId)->body_part__name'
				),
				//'body_profilesId',
				array (
						'name' => 'exerciseid',
						// 'value'=>'$data->customers->FirstNameB',
						//'filter' => CHtml::listData ( Athlete::model ()->findAll (), 'id', 'first_name' ),
						'value' => 'Exercise::model()->FindByPk($data->exerciseid)->name'
				),
			//	'exerciseid',

				array(
						'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=> '{view}'
				),
		),
));

/*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>