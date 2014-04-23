<?php
/* @var $this RecordDataController */
/* @var $data RecordData */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calories')); ?>:</b>
	<?php echo CHtml::encode($data->calories); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assist')); ?>:</b>
	<?php echo CHtml::encode($data->assist); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reps')); ?>:</b>
	<?php echo CHtml::encode($data->reps); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	

</div>