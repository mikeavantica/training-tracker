<?php
/* @var $this WorkoutController */
/* @var $model Workout */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Workouts' => 'index',
				$model->name 
		) 
) );

$this->menu = array (
	
		array (
				'label' => 'Create Workout',
				'url' => array (
						'create' 
				) 
		),
		array (
				'label' => 'Update Workout',
				'url' => array (
						'update',
						'id' => $model->id 
				) 
		),
		array (
				'label' => 'Delete Workout',
				'url' => '#',
				'linkOptions' => array (
						'submit' => array (
								'delete',
								'id' => $model->id 
						),
						'confirm' => 'Are you sure you want to delete this item?' 
				) 
		),
		array (
				'label' => 'Manage Workout',
				'url' => array (
						'admin' 
				) 
		) 
);
?>

<h3>Workout <?php echo $model->name; ?></h3>

<table class="table table-striped">
	<thead>
		<tr>
			<!--  <th><?php //echo CHtml::encode($model->getAttributeLabel('id')); ?></th> -->
			<th><?php echo CHtml::encode($model->getAttributeLabel('date')); ?></th>
			<th><?php echo CHtml::encode($model->getAttributeLabel('name')); ?></th>
			<th><?php echo CHtml::encode($model->getAttributeLabel('description')); ?></th>
			<th><?php echo CHtml::encode($model->getAttributeLabel('workout_typeid')); ?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<!--  	<td><?php //echo CHtml::encode($model->id); ?></td> -->
			<td><?php echo CHtml::encode($model->date); ?></td>
			<td><?php echo CHtml::encode($model->name); ?></td>
			<td><?php echo CHtml::encode($model->description); ?></td>
			<td><?php echo CHtml::encode($model->workoutType->name)?></td>
			<td><?php echo  CHtml::link('<i class="icon-edit"style="margin-left:-10px;"></i>',array('Workout/update','id'=>$model->id))//TbHtml::link('',array('icon' => TbHtml::ICON_EDIT,'url'=>array('Workout/update','id'=>$model->id)));//TbHtml::icon(TbHtml::ICON_EDIT) ?> </td>

		</tr>
		<tr>
			<!--  <td></td> -->
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>

		</tr>
	</tbody>
</table>

<?php

$this->widget('bootstrap.widgets.TbGridView', array(
		'id' => 'releasenote-grid',
		'selectableRows'=>0,
		'dataProvider' => WorkoutDetail::model()->search2($model->id),
		'columns' => array(
				/*array(
						'name' => 'id',
						'header' => '#',
				),*/
				array( 'class'=>'CCheckBoxColumn',
                        'checked' => '$data->measure_height == 1',
 						
 						'name'=>'measure_height',
 						'header' => 'Height',
						'disabled'=> 'true'
				),
				array(  'class'=>'CCheckBoxColumn',
						'name' => 'measure_weight',
                        'checked' => '$data->measure_weight == 1',
						'header' => 'Weight',
						'disabled'=> 'true'
						
				),
				array(  'class'=>'CCheckBoxColumn',
						'name' => 'measure_calories',
                        'checked' => '$data->measure_calories == 1',
						'header' => 'Calories',
                        'disabled'=> 'true'
				),
                array( 'class'=>'CCheckBoxColumn',
                       'checked' => '$data->measure_assist == 1',
                       'name'=> 'measure_assist',
                       'header'=> 'Assist',
                       'disabled'=> 'true'),
                array('name'=> 'total_reps',
                      'header'=> 'Reps',
                       'visible'=> $model->workout_typeid == 1),
                array('name'=> 'total_time',
                      'header'=> 'Time',
                       'visible'=>$model->workout_typeid == 2),
              /*  array (
		'name' => 'workoutid',
        'header'=> 'WorkOut',
        'value'=>' $data->workout->name',*/
		
                /*array('name' => 'workoutid',
                      'header'=> 'WorkOut')*/
                array('name'=> 'exerciseid',
                      'value'=> '$data->exercise->name',

                      'header'=> 'Exercise'),
				array('class' => 'CButtonColumn',
                       'template'=>'{update}{delete}',
						'buttons' => array(
                        
								'update' => array(
										'label' => '',
										'imageUrl' => '',
										'url' => "CHtml::normalizeUrl(array('/WorkoutDetail/update', 'id'=>\$data->id))",
										'options' => array('class' => 'icon-edit')
 								),
								'delete' => array(
										'label' => '',
										'imageUrl' => '',
										'url' => "CHtml::normalizeUrl(array('/WorkoutDetail/delete', 'id'=>\$data->id))",
										'options' => array('class' => 'icon-remove'),
								),
						),
				),
		),
)
);
?>
    <?php
      echo   TbHtml::linkButton('Add Exercise(s)',array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_SMALL,'url'=>array('WorkoutDetail/create','id'=>$model->id))); ?>
  

    <?php    
//     $this->widget('bootstrap.widgets.TbButton', array(
//         'type' => 'inverse',
//         'label' => 'Go back',
//         'url' => Yii::app()->request->urlReferrer,
//     ));
    ?>

