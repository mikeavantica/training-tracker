<?php
/* @var $this RecordDataController */
/* @var $data RecordData */
?>

<div class="view">
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
                <td><?php echo CHtml::encode($data->time); ?>
                <td class="button-column">
                    <a class="icon-edit" href="#" title="Update" class="update">
                        <img src alt></a> 
                    <a class="icon-remove" href="#" title="Delete" class="delete">
                        <img src alt></a>
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