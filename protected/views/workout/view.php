<?php
/* @var $this WorkoutController */
/* @var $model Workout */
?>
<script>
function userClicks(target_id) {
    id_lote =$.fn.yiiGridView.getSelection(target_id); 
    alert(id_lote);

}
   $(function(){
	   $('#dpExercise').change(function() {
           var url = window.location.pathname;
           var exercise = $('#dpExercise').val();
         
           $.ajax({
     			 type:  "get",
                  url: window.location.pathname,
                  dataType: "json",
                  data: "r=WorkoutDetail/noRepeatExercise&id=<?php echo $model->id; ?>&exercise="+exercise,
                 success: function(data){
                 	if(data.id == 0 ){
                     	//everything is okay
                 
               
                 	 }
                 	else{
                 	alert("you need to choose another exercise, because the exercise selected is already in the workout");
                   }

                     	}
                  ,error : function(request, status, error){}

         		});
          
       });
	 
	    $('#updateGrid').on('click', function() { 
		    var $this = $(this); 
		    var cityId =$this.data('detail-id'); 
		    //var projectId = $this.data('project-id'); 
		    alert("Hola!!!"+cityId);
		    
		     }); 

	  
		
	   });

</script>
<?php

$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				'Workouts' => 'admin',
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
<div style="margin-left: 20px;" >
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
             <?php  echo $form->label($model,'workout_typeid'); ?>
            <?php echo  $form->dropDownList($model, 'workout_typeid', CHtml::listData(WorkoutType::model()->findAll(), 'id', 'name'),array('style'=>'width:200px;'));//echo $form->textFieldControlGroup($model,'workout_typeid',array('span'=>5)); ?>
            </td>
			<td>
            <?php echo $form->textFieldControlGroup($model,'description',array('span'=>1,'maxlength'=>150,'style'=>'width:200px;')); ?>
            </td>

		</tr>
	</table>
	<div class="form-actions">
        <?php
								echo BsHtml::submitButton ( 'Submite WOD', array (
										'color' => BsHtml::BUTTON_COLOR_PRIMARY,
										'size' => BsHtml::BUTTON_SIZE_SMALL,
										'submit' => 'create' 
								) );
								?> 
&nbsp &nbsp &nbsp
<?php

if ($model->id != "") {
	echo BsHtml::submitButton ( 'Update Workout', array (
			'color' => BsHtml::BUTTON_COLOR_PRIMARY,
			'size' => BsHtml::BUTTON_SIZE_SMALL,
			'submit' => array (
					'update',
					'id' => $model->id 
			) 
	) );
}
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
			'enableAjaxValidation' => false ,
      
	) );
	?>


<?php  echo $form->errorSummary($modelDetail); ?>
<div class="form">
	<div style="display: none;">
            <?php echo $form->dropDownList($modelDetail, 'workoutid', CHtml::listData(Workout::model()->findAll(), 'id', 'name')); ?>
            </div>

	<div class="column">
            <?php  echo $form->label($modelDetail,'exerciseid'); ?>
            <?php echo  $form->dropDownList($modelDetail, 'exerciseid', CHtml::listData(Exercise::model()->findAll(), 'id', 'name'),array('id'=>'dpExercise','prompt'=>'Select a exercise')); ?>
            <?php
												
												?>
            
</div>
	<div class="column">
              <?php
														
														if ($model->workout_typeid == 1 || $model->workout_typeid == 3) {
															if (! Workout::model ()->hasSons ( $model->id )) {
																
																echo $form->label ( $modelDetail, 'total_reps' );
																echo $form->numberField ( $modelDetail, 'total_reps', array (
																		// 'span' => 3,
																		'lenght' => 11,
																		'min' => 0 
																) );
															} else {
                                                                $modelDetail->total_reps = WorkoutDetail::model()->sonTotalReps($model->id);
																echo $form->label ( $modelDetail, 'total_reps' );
																echo $form->numberField ( $modelDetail, 'total_reps', array (
	                                                                           		'lenght' => 11,
	                                                                                'min' => 0 ,
                                                                                      ));
															}
														}
														
														?>
											<?php
											if ($model->workout_typeid == 2) {
												if (! Workout::model ()->hasSons ( $model->id )) {
													echo $form->label ( $modelDetail, 'total_time' );
													$this->widget ( 'ext.EJuiTimePicker.EJuiTimePicker', array (
															'model' => $modelDetail, // Your model
															'attribute' => 'total_time', // Attribute for input
															'options' => array (
																	'timeOnly' => true,
																	'timeFormat' => 'mm:ss',
																	'showSecond' => true,
																	'showHour' => false 
															),
															'htmlOptions' => array (
																	'class' => 'form-control' ,
                                                                    
															) 
													) );
												} else {
													$modelDetail->total_time = WorkoutDetail::model ()->sonTotalTime ( $model->id );
													echo $form->label ( $modelDetail, 'total_time',array('style'=> 'display:none') );
													$this->widget ( 'ext.EJuiTimePicker.EJuiTimePicker', array (
															'model' => $modelDetail, // Your model
															'attribute' => 'total_time', // Attribute for input
															'options' => array (
																	'timeOnly' => true,
																	'timeFormat' => 'mm:ss',
																	'showSecond' => true,
																	'showHour' => false 
															),
															'htmlOptions' => array (
																	'class' => 'form-control' ,
                                                                     'style'=> 'display:none'
															) 
													)
													 );
												}
											}
											
											?>

            </div>
	<div class="column">
		<div style="font-weight: bold; font-size: 0.9em; display: block;">Measure</div>
		<div class="column">
            <?php echo $form->checkBoxControlGroup($modelDetail,'measure_weight'); ?>

                        </div>
		<div class="column"> 
            <?php echo $form->checkBoxControlGroup($modelDetail,'measure_height'); ?>
            </div>
		<div class="column">
          
            <?php
												
												echo $form->checkBoxControlGroup ( $modelDetail, 'measure_calories' );
												echo $form->hiddenField ( $modelDetail, 'workoutid', array (
														'value' => $model->id 
												) )?>
                     </div>

		<div class="column">
            <?php echo $form->checkBoxControlGroup($modelDetail,'measure_assist'); ?>
            </div>
	</div>

	<div class="row" style="padding: 30px;"> 
        <?php
								if ($model->id != "") {
									echo BsHtml::submitButton ( 'Add Another Exercise', array (
											'color' => BsHtml::BUTTON_COLOR_PRIMARY,
											'size' => BsHtml::BUTTON_SIZE_SMALL,
											'submit' => '../WorkoutDetail/create' 
									) );
								}
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
			<!--  <th></th>-->
		</tr>
	</thead>
	<tbody>
		<tr>
			<!--  	<td><?php //echo CHtml::encode($model->id); ?></td> -->
			<td><?php echo CHtml::encode($model->date); ?></td>
			<td><?php echo CHtml::encode($model->name); ?></td>
			<td><?php echo CHtml::encode($model->description); ?></td>
			<td><?php if(!isset($model->workoutType->name)){echo "";}else{ echo CHtml::encode($model->workoutType->name);}?></td>
			<!--  <td><?php // echo  CHtml::link('<i class="glyphicon glyphicon-edit"style="margin-left:-10px;"></i>',array('Workout/update','id'=>$model->id))//TbHtml::link('',array('icon' => TbHtml::ICON_EDIT,'url'=>array('Workout/update','id'=>$model->id)));//TbHtml::icon(TbHtml::ICON_EDIT) ?> </td>-->

		</tr>
		<tr>
			<!--  <td></td> -->
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<!--  <td></td>-->

		</tr>
	</tbody>
</table>


<?php

$this->widget ( 'bootstrap.widgets.BsGridView', array (
		'id' => 'releasenote-grid',
		'selectableRows' => 1,
		'dataProvider' => WorkoutDetail::model ()->search2 ( $model->id ),
        'selectionChanged'=>'js:userClicks',
		'columns' => array(
				/*array(
						'name' => 'id',
						'header' => '#',
				),*/
               array (
						'name' => 'exerciseid',
						'value' => '$data->exercise->name',
						
						'header' => 'Exercise' 
				),
				array (
						'class' => 'CCheckBoxColumn',
						'checked' => '$data->measure_height == 1',
						'selectableRows' => 0,
						'name' => 'measure_height',
						'header' => 'Height',
						'disabled' => 'true' 
				),
				array (
						'class' => 'CCheckBoxColumn',
						'name' => 'measure_weight',
                        'selectableRows' => 0,
						'checked' => '$data->measure_weight == 1',
						'header' => 'Weight',
						'disabled' => 'true' 
				),
				array (
						'class' => 'CCheckBoxColumn',
						'name' => 'measure_calories',
                         'selectableRows' => 0,
						'checked' => '$data->measure_calories == 1',
						'header' => 'Calories',
						'disabled' => 'true' 
				),
				array (
						'class' => 'CCheckBoxColumn',
						'checked' => '$data->measure_assist == 1',
						'name' => 'measure_assist',
                        'selectableRows' => 0,
						'header' => 'Assist',
						'disabled' => 'true' 
				),
				array (
						'name' => 'total_reps',
						'header' => 'Reps',
						'visible' => $model->workout_typeid == 1 || $model->workout_typeid == 3 ,
                        
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
						'class' => 'CButtonColumn',
						'template' => '{delete}',
                         
						'buttons' => array (
								
// 								 'update' => array (
// 								 'label' => '',
// 								 'imageUrl' => '',
                                 
// 								 'url' => '',//"CHtml::normalizeUrl(array('/WorkoutDetail/update', 'id'=>\$data->id))",
// 								 'options' => array (
                                 
// 								 'class' => 'glyphicon glyphicon-edit',
//                                  'id'=> "updateGrid",
//                                  'data-detail-id'=> '$data->id',
//                                  'data-exercise-id'=> '$data->exerciseid',
//                                  'data-measure-height'=> '$data->measure_height',
//                                  'data-measure-weight'=> '$data->measure_weight',
//                                  'data-measure-calories'=>'$data->measure_calories',
//                                  'data-measure-assist' => '$data->measure_assist'
                                
// 								 )
// 								 ),
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
				// echo BsHtml::linkButton ( 'Add Exercise(s)', array (
				// 'color' => BsHtml::BUTTON_COLOR_PRIMARY,
				// 'size' => BsHtml::BUTTON_SIZE_SMALL,
				// 'url' => array (
				// 'WorkoutDetail/create',
				// 'id' => $model->id
				// )
				// ) );
				?>
  

    <?php
    $this->widget('bootstrap.widgets.BsListView',array(
    		'dataProvider'=>$dataProvider,
    		'itemView'=>'father',
    ));
				?>
				
				</div>

