<?php
/* @var $this RecordDataController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        'Record Data'
    )
));

$this->menu = array(
    array(
        'label' => 'Create RecordData',
        'url' => array(
            'create'
        )
    ),
    array(
        'label' => 'Manage RecordData',
        'url' => array(
            'admin'
        )
    )
);
?>

<h1>Record Data</h1>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'record-data-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>



<table>
    <tr>
        <th><?php echo $form->labelEx($model,'Date'); ?></th>
        <th>WOD</th>
        <th><?php echo $form->labelEx($model,'athleteid'); ?></th>
        <th><?php echo $form->labelEx($model,'time'); ?></th>
    </tr>
    <tr>
        
        <td><?php echo $form->dateField($model, 'date',array('span'=>3)); ?></td>
        <td><?php 
            $list=CHtml::listData(Workout::model()->findAll(), 'id', 'name');
            $list['empty'] = 'select';
            echo CHtml::dropDownList('wod', 'empty', $list);
            ?>
        </td>
        <td><?php echo  $form->dropDownList($model, 'athleteid', CHtml::listData(Athlete::model()->findAll(), 'id', 'first_name')); ?></td>
        <td><?php echo $form->timeField($model,'time',array('span'=>3)); ?></td>
    </tr>
</table>
<div id="exercises">

</div>
    
    
    <input type="submit" class="btn btn-primary btn-small" value="create" >
    
    <?php $this->endWidget(); ?>
    
</div><!-- form -->

<?php
Yii::app()->clientScript->registerScript('settings-script', <<<EOD
        $('#wod').change(function() {
            var value = $(this).val();
            $.get('populateWOD?id=' + value, function(data, textStatus, jqXHR) {
                    $('#exercises').empty();
                    $('#exercises').append(data);
                }
            );
        });
EOD
);
?>

<?php
 $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_recordDetail',
)); 
/*$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'record-data-grid',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'date',
        array(
            'name' => 'workout_detailid',
            //'value'=>'$data->customers->FirstNameB',
            //	'filter' => CHtml::listData(Workout::model()->findAll(),'id','name'),
            'value' => 'Workout::model()->FindByPk($data->workout_detailid)->name',
        ),
        'athlete.fullName',
        array(
            'header' => 'Data',
            'type' => 'html',
            'value'=>array($this,'getDetailRecordData')
        ),
        array(// display a column with "view", "update" and "delete" buttons
            'class' => 'CButtonColumn',
        ),
    )
));*/
?>