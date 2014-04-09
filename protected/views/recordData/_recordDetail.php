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
                    <a href="#" title="Update" class="update">
                        <img alt="Update" src="/assets/6265ae6a/gridview/update.png"></a> 
                    <a href="#" title="Delete" class="delete">
                        <img alt="Delete" src="/assets/6265ae6a/gridview/delete.png"></a>
                </td>
            </tr>
        </tbody>
    </table>
    <fieldset>
        <?php
        echo $this->renderPartial("DetailRecordData", array('model' => $data));
        ?>
    </fieldset>
</div>