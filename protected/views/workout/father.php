<div class="panel panel-darkblue">
    <div class="panel-heading">
        Workout: <?php echo $data->name; ?>
        <span class="pull-right">
            <?php if (strpos(Yii::app()->request->url, 'index.php/Workout/UpdateDetail') !== false) { ?>
                <a class="glyphicon glyphicon-edit" href="<?php echo '../update?id=' . $data->id ?>"
                   title="Update"
                   class="update">
                    <img src alt></a>
            <?php
            } else {
            ?>
                <a class="glyphicon glyphicon-edit" href="<?php echo 'update?id=' . $data->id ?>" title="Update"
                   class="update">
                    <img src alt></a>

            <?php
            }
            echo CHtml::link(CHtml::encode(''), array('delete', 'id' => $data->id),
                array(
                    'submit' => array('workout/delete', 'id' => $data->id),
                    'title' => 'delete',
                    'class' => 'glyphicon glyphicon-remove', 'confirm' => 'This will remove the Record Data. Are you sure?'
                )
            );
            ?>
        </span>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?php echo CHtml::encode($data->getAttributeLabel('date')); ?></th>
                <th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
                <th><?php echo CHtml::encode($data->getAttributeLabel('description')); ?></th>
                <th><?php echo CHtml::encode($data->getAttributeLabel('workout_typeid')); ?></th>
                <?php if ($data->workout_typeid == 2) { ?>
                    <th> Total Time</th>
                <?php } ?>
            </tr>
            </thead>
            <tbody>
            <tr class="odd">
                <td><?php echo CHtml::encode($data->date); ?></td>
                <td><?php echo CHtml::encode($data->name); ?></td>
                <td><?php echo CHtml::encode($data->description); ?></td>
                <td><?php echo CHtml::encode($data->workoutType->name); ?></td>
                <?php if ($data->workout_typeid == 2) {
                    if (Workout::model()->hasSons($data->id)) {
                        ?>
                        <td> <?php echo CHtml::encode(WorkoutDetail::model()->sonTotalTime($data->id)) ?></td>
                    <?php
                    } else {
                        ?>
                        <td>00:00</td>
                    <?php
                    }
                } ?>
            </tr>
            </tbody>

        </table>
        <fieldset>
            <?php
            echo $this->renderPartial("son", array('model' => $data));
            ?>
        </fieldset>
    </div>
</div>
