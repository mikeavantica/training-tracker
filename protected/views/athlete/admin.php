<div style="margin-left: 20px;">
<?php
/* @var $this AthleteController */
/* @var $model Athlete */

$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				'Manage' 
		) 
) );

$this->menu = array (
		
		array (
				'label' => 'Create Athlete',
				'url' => array (
						'create' 
				) 
		) 
);

?>

 <?php
 foreach(Yii::app()->user->getFlashes() as $key => $message) {
 	echo '<div class="alert alert-danger alert-dismissable">' . $message . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button></div>\n";
 };
	
	$form = $this->beginWidget ( 'bootstrap.widgets.BsActiveForm', array (
			'id' => 'athlete-form',
			// 'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation' => false ,
      
	) );
	?>

<?php echo $form->errorSummary($model); ?>
<script>
function validateKeys(ele, evt, ints){
	//no permite comas ni puntos
	  var charCode = (evt.which) ? evt.which : event.keyCode
	            var value = ele.value;
	            var dotcontains = value.indexOf(".") != -1;
	            if (dotcontains)
	                if (charCode == 46) return false;
	            if (charCode == 46) return true;
	            if (charCode > 31 && (charCode < 48 || charCode > 57))
	                return false;
	            return true;
}
	</script>
<div class="form">
 
	<table>
	<tr>
	
	<td>
	<div style="margin-right:20px;"> 
	<?php echo $form->textFieldControlGroup($add,'first_name',array('span'=>2,'maxlength'=>45)); ?>
	
	</div>
	</td>
	
	<td>
	<div style="margin-right:20px;"> 
	<?php echo $form->textFieldControlGroup($add,'last_name',array('span'=>2,'maxlength'=>45)); ?>
	</div>
	</td>
	<td>
	<div style="margin-right:20px;"> 
	<?php echo $form->emailFieldControlGroup($add, 'email'); ?>
	</div>
	</td>
	<td>
	<div style="margin-right:20px; margin-bottom: 20px;"> 
	        <?php  echo $form->label($add,'sex_typeid'); ?>
            <?php echo $form->dropDownList($add,'sex_typeid',array('1'=>'Male','2'=>'Female')); ?> 
            </div>
	</td>
	<td>
	<div style="margin-right:20px;margin-bottom: 10px;"> 
	 <?php //echo $form->label($add,'height'); ?>
            <?php echo $form->textFieldControlGroup($add,'height',array('maxlenght'=>10,'span'=>2,'onKeyPress'=>'return validateKeys(this, event,3);')); 
														?>
	</div>
	</td>
	<td>
	<div style="margin-right:20px; margin-bottom: 10px;"> 
	 <?php //echo $form->label($add,'weight'); ?>
            <?php echo $form->textFieldControlGroup($add,'weight',array('maxlenght'=>10,'span'=>2,'onKeyPress'=> 'return validateKeys(this, event,3);'))  ?>
	</div> 
	</td>
	
	
	<td>
	<div style="margin-right: 20px; margin-top: 15px;">
	        <?php
							if($add->id == ""){
									echo BsHtml::submitButton ('Add Athlete', array (
											'color' => BsHtml::BUTTON_COLOR_PRIMARY,
											'size' => BsHtml::BUTTON_SIZE_SMALL,
											'submit' => 'create'
									) );
}else{
	echo BsHtml::submitButton ('Update Athlete', array (
		'color' => BsHtml::BUTTON_COLOR_PRIMARY,
		'size' => BsHtml::BUTTON_SIZE_SMALL,
        'submite'=> 'update'
) );

}
							
								?>
								</div>
	</td>
	</tr>
	</table>
	</div>							
				

	<div class="row" style="padding: 30px;"> 

     </div>
<?php $this->endWidget(); ?>

<!-- search-form -->

<?php
$this->widget ( 'bootstrap.widgets.BsGridView', array (
		'id' => 'athlete-grid',
		'dataProvider' => $model->search (),
		'columns' => array (
				// 'id',
				array (
						'name' => 'first_name',
						'value' => 'GlobalFunctions::truncate($data->first_name)' 
				),
				array (
						'name' => 'last_name',
						'value' => 'GlobalFunctions::truncate($data->last_name)'
				),
				'email',
				'height',
				'weight',
				// 'sex_typeid',
				array (
						'name' => 'sex_typeid',
						'value' => '$data->sex_typeid == 1 ? "Male" : "Female"' 
				),
                array('class' => 'CButtonColumn',
		'template'=>'{update}{delete}{stats}',
        'deleteConfirmation'=>"js:'if you delete an athlete, you will permanently delete all of the athlete data, are you sure you want to delete '+$(this).parent().parent().children(':nth-child(1)').text()+' '+$(this).parent().parent().children(':nth-child(2)').text()+'?'",
        'htmlOptions'=>array('width'=>'100px'),
		'buttons' => array(

				'update' => array(
						'label' => '',
						'imageUrl' => '',
						'url' => "CHtml::normalizeUrl(array('/Athlete/update', 'id'=>\$data->id))",
						'options' => array('class' => 'glyphicon glyphicon-edit', 'style' => 'margin: 0 3px;')
				),
//                 'view' => array(
// 		        'label' => '',
// 	            'imageUrl' => '',
// 		        'url' => "CHtml::normalizeUrl(array('/Athlete/view', 'id'=>\$data->id))",
// 		        'options' => array('class' => 'glyphicon glyphicon-search', 'style' => 'margin: 0 3px;')
//                  ),
				'delete' => array(
						'label' => '',
						'imageUrl' => '',
						'url' => "CHtml::normalizeUrl(array('/Athlete/delete', 'id'=>\$data->id))",
						'options' => array('class' => 'glyphicon glyphicon-remove', 'style' => 'margin: 0 3px;'),
				),
                'stats' => array(
						'label' => '',
						
						'url' => "CHtml::normalizeUrl(array('/Athlete/AthleteStats', 'id'=>\$data->id))",
                        'options' => array('class' => 'glyphicon glyphicon-adjust', 'style' => 'margin: 0 3px;'),
						
				),
                     
                
		),
)
				
				/*array (
						'class' => 'bootstrap.widgets.BsButtonColumn' 
				)*/
				 
		) 
) );
?>
</div>