<?php
/* @var $this WorkoutDetailController */
/* @var $data WorkoutDetail */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('measure_weight')); ?>:</b>
    <?php echo CHtml::encode($data->measure_weight); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('measure_height')); ?>:</b>
    <?php echo CHtml::encode($data->measure_height); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('measure_calories')); ?>:</b>
    <?php echo CHtml::encode($data->measure_calories); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('measure_assist')); ?>:</b>
    <?php echo CHtml::encode($data->measure_assist); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('total_reps')); ?>:</b>
    <?php echo CHtml::encode($data->total_reps); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('total_time')); ?>:</b>
    <?php echo CHtml::encode($data->total_time); ?>
    <br/>

    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('workoutid')); ?>:</b>
	<?php echo CHtml::encode($data->workoutid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exerciseid')); ?>:</b>
	<?php echo CHtml::encode($data->exerciseid); ?>
	<br />

	*/
    ?>

</div>