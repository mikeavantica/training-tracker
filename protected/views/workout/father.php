<div style="margin-left: 20px;">
<div class="row">
     <div class="col-md-12 well">
      
     </div>
     

    </div>

<!--  <div class="col-md-11 well"></div> -->
<table class="table users-table table-condensed table-hover ">
        <thead>
            <tr>
                <th ><?php echo CHtml::encode($data->getAttributeLabel('date')); ?></th>
                <th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
                <th><?php echo CHtml::encode($data->getAttributeLabel('description')); ?></th>
                <th><?php echo CHtml::encode($data->getAttributeLabel('workout_typeid')); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd">
                <td><?php echo CHtml::encode($data->date); ?></td>
                <td><?php echo CHtml::encode($data->name); ?></td>
                <td><?php echo CHtml::encode($data->description); ?>
                <td><?php echo CHtml::encode($data->workoutType->name); ?>
                <td class="button-column">
                    <a class="glyphicon glyphicon-edit" href="<?php echo 'update?id=' . $data->id ?>" title="Update" class="update">
                        <img src alt></a> 
                    <?php 
                        echo CHtml::link(CHtml::encode(''), array('delete', 'id'=>$data->id),
                            array(
                              'submit'=>array('workout/delete', 'id'=>$data->id),
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
        echo $this->renderPartial("son", array('model' => $data));
        ?>
    </fieldset>

</div>