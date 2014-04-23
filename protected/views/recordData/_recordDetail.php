<?php
/* @var $this RecordDataController */
/* @var $data RecordData */
?>

<div class="panel panel-archon">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
        
    <table class="items table">
        <thead>
            <tr>
                <th ><?php echo CHtml::encode($data->getAttributeLabel('date')); ?></th>
                <th><?php echo CHtml::encode($data->getAttributeLabel('workout_detailid')); ?></th>
                <th><?php echo CHtml::encode($data->getAttributeLabel('athleteid')); ?></th>
                <th><?php echo CHtml::encode($data->getAttributeLabel('time')); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd">
                <td><?php echo CHtml::encode($data->date); ?></td>
                <td><?php echo CHtml::encode($data->workoutDetail->workout->name); ?></td>
                <td><?php echo CHtml::encode($data->athlete->fullname); ?>
                <td><?php echo CHtml::encode(date("i:s", strtotime($data->time))); ?>
                <td class="button-column">
                    <a class="glyphicon glyphicon-edit" href="<?php echo 'update?athleteid=' . $data->athleteid . '&date=' . $data->date ?>" title="Update" class="update">
                        <img src alt></a> 
                    <?php 
                        echo CHtml::link(CHtml::encode(''), array('delete', 'id'=>$data->id),
                            array(
                              'submit'=>array('recordData/delete', 'id'=>$data->id),
                              'title' => 'delete',
                              'class' => 'glyphicon glyphicon-remove','confirm'=>'This will remove the Record Data. Are you sure?'
                            )
                        );
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    <fieldset>
        <?php
        echo $this->renderPartial("detailRecordData", array('model' => $data));
        ?>
    </fieldset>
</div>
</div>