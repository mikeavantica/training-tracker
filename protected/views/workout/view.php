<?php
/* @var $this WorkoutController */
/* @var $model Workout */
?>
<script>
   $(function(){
	  
		$("#txtTime").change(function(){
			if($("#txtTime").val()==""){
				 alert($("#txtTime").val());
				$("#txtTime").val("00:00:00");
				}
			});
	   });

</script>
<?php

$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
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
<div class="form">
    <?php
				
				$form = $this->beginWidget ( 'bootstrap.widgets.BsActiveForm', array (
						'id' => 'workout-form',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation' => false 
				) );
				?>

   <!--  <p class="help-block">Fields with <span class="required">*</span> are required.</p> -->

    <?php echo $form->errorSummary($model); ?>
              <table>
		<tr>
			<td>
              
            <?php echo $form->dateFieldControlGroup($model, 'date',array('span'=>1,'style'=>'width:200px;')); ?>
            </td>
			<td>
            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>1,'maxlength'=>45,'style'=>'width:200px;')); ?>
            </td>
			<td>
            <?php echo $form->textFieldControlGroup($model,'description',array('span'=>1,'maxlength'=>150,'style'=>'width:200px;')); ?>
            </td>
			<td>
             <?php  echo $form->label($model,'workout_typeid'); ?>
            <?php echo  $form->dropDownList($model, 'workout_typeid', CHtml::listData(WorkoutType::model()->findAll(), 'id', 'name'),array('style'=>'width:200px;'));//echo $form->textFieldControlGroup($model,'workout_typeid',array('span'=>5)); ?>
            </td>
		</tr>
	</table>
	<div class="form-actions">
        <?php
								echo BsHtml::submitButton ( 'Create Workout', array (
										'color' => BsHtml::BUTTON_COLOR_PRIMARY,
										'size' => BsHtml::BUTTON_SIZE_SMALL,
										'submit' => 'create' 
								) );
?> 
&nbsp &nbsp &nbsp
<?php 
         echo BsHtml::submitButton ( 'Update Workout', array (
		'color' => BsHtml::BUTTON_COLOR_PRIMARY,
		'size' => BsHtml::BUTTON_SIZE_SMALL,
		'submit' => array('update','id'=>$model->id),
        
        
) );
								?>				
							
    </div>
    
</div>

<?php $this->endWidget(); ?>
 <?php
				
				$form = $this->beginWidget ( 'bootstrap.widgets.BsActiveForm', array (
						'id' => 'workout-detail-form',
					// 'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
                        
						
				) );
				?>


<?php  echo $form->errorSummary($modelDetail); ?>
<div class="form">
	<div  style="display:none;">
            <?php echo $form->dropDownList($modelDetail, 'workoutid', CHtml::listData(Workout::model()->findAll(), 'id', 'name')); ?>
            </div>
	
	<div class="column">
            <?php  echo $form->label($modelDetail,'exerciseid'); ?>
            <?php echo  $form->dropDownList($modelDetail, 'exerciseid', CHtml::listData(Exercise::model()->findAll(), 'id', 'name')); ?>
            <?php
												
												?>
            
</div>
<div class="column">
              <?php 
              	
              
														if ($model->workout_typeid == 1) {
                                                            echo $form->label($modelDetail, 'total_reps');
															echo $form->numberField( $modelDetail, 'total_reps', array (
																	// 'span' => 3,
																	'lenght' => 11,
                                                                    'min'=>0 
															) );
														}
														?>
											<?php
											if ($model->workout_typeid == 2) {
                                               
												echo $form->label ( $modelDetail, 'total_time' );
												
                                         
												echo $form->timeField( $modelDetail, 'total_time',array('id'=>'txtTime' ,'step'=>1));
										
												

											
											}
              
											?>

            </div>
	<div class="column" >
		<div style="font-weight: bold;
font-size: 0.9em;
display: block;">Measure</div>
            <?php  //echo $form->label($model,'measure_weight'); ?>
            <?php echo $form->checkBoxControlGroup($modelDetail,'measure_weight'); ?>

            <?php  //echo $form->label($model,'measure_height'); ?>
            <?php echo $form->checkBoxControlGroup($modelDetail,'measure_height'); ?>
           
            <?php  //echo $form->label($model,'measure_calories'); ?>
            <?php echo $form->checkBoxControlGroup($modelDetail,'measure_calories');
                     echo $form->hiddenField($modelDetail,'workoutid',array('value'=>$model->id)) ?>
               
            <?php  //echo $form->label($model,'measure_calories'); ?>
            <?php echo $form->checkBoxControlGroup($modelDetail,'measure_assist'); ?>
             </div>

	<div class="row" style=" padding: 30px;"> 
        <?php
								
								echo BsHtml::submitButton ( 'Add Exercise(s)', array (
										'color' => BsHtml::BUTTON_COLOR_PRIMARY,
										'size' => BsHtml::BUTTON_SIZE_SMALL,
                                        'submit' =>'../workoutdetail/create',
                                         
								) );
								?>
     </div>
<?php $this->endWidget(); ?>
</div>

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
			<td><?php echo  CHtml::link('<i class="glyphicon glyphicon-edit"style="margin-left:-10px;"></i>',array('Workout/update','id'=>$model->id))//TbHtml::link('',array('icon' => TbHtml::ICON_EDIT,'url'=>array('Workout/update','id'=>$model->id)));//TbHtml::icon(TbHtml::ICON_EDIT) ?> </td>

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

$this->widget ( 'bootstrap.widgets.BsGridView', array (
		'id' => 'releasenote-grid',
		'selectableRows' => 0,
		'dataProvider' => WorkoutDetail::model ()->search2 ( $model->id ),
		'columns' => array(
				/*array(
						'name' => 'id',
						'header' => '#',
				),*/
				array (
						'class' => 'CCheckBoxColumn',
						'checked' => '$data->measure_height == 1',
						
						'name' => 'measure_height',
						'header' => 'Height',
						'disabled' => 'true' 
				),
				array (
						'class' => 'CCheckBoxColumn',
						'name' => 'measure_weight',
						'checked' => '$data->measure_weight == 1',
						'header' => 'Weight',
						'disabled' => 'true' 
				),
				array (
						'class' => 'CCheckBoxColumn',
						'name' => 'measure_calories',
						'checked' => '$data->measure_calories == 1',
						'header' => 'Calories',
						'disabled' => 'true' 
				),
				array (
						'class' => 'CCheckBoxColumn',
						'checked' => '$data->measure_assist == 1',
						'name' => 'measure_assist',
						'header' => 'Assist',
						'disabled' => 'true' 
				),
				array (
						'name' => 'total_reps',
						'header' => 'Reps',
						'visible' => $model->workout_typeid == 1 
				),
				array (
						'name' => 'total_time',
						'header' => 'Time',
						'visible' => $model->workout_typeid == 2 
				),
              /*  array (
		'name' => 'workoutid',
        'header'=> 'WorkOut',
        'value'=>' $data->workout->name',*/
		
                /*
				 * array('name' => 'workoutid', 'header'=> 'WorkOut')
				 */
				array (
						'name' => 'exerciseid',
						'value' => '$data->exercise->name',
						
						'header' => 'Exercise' 
				),
				array (
						'class' => 'CButtonColumn',
						'template' => '{update}{delete}',
						'buttons' => array (
								
								'update' => array (
										'label' => '',
										'imageUrl' => '',
										'url' => "CHtml::normalizeUrl(array('/WorkoutDetail/update', 'id'=>\$data->id))",
										'options' => array (
												'class' => 'glyphicon glyphicon-edit' 
										) 
								),
								'delete' => array (
										'label' => '',
										'imageUrl' => '',
										'url' => "CHtml::normalizeUrl(array('/WorkoutDetail/delete', 'id'=>\$data->id))",
										'options' => array (
												'class' => 'glyphicon glyphicon-remove' 
										) 
								) 
						) 
				) 
		) 
) );
?>
    <?php
// 				echo BsHtml::linkButton ( 'Add Exercise(s)', array (
// 						'color' => BsHtml::BUTTON_COLOR_PRIMARY,
// 						'size' => BsHtml::BUTTON_SIZE_SMALL,
// 						'url' => array (
// 								'WorkoutDetail/create',
// 								'id' => $model->id 
// 						) 
// 				) );
				?>
  

    <?php
				// $this->widget('bootstrap.widgets.TbButton', array(
				// 'type' => 'inverse',
				// 'label' => 'Go back',
				// 'url' => Yii::app()->request->urlReferrer,
				// ));
				?>

