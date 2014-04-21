<?php
/* @var $this BodyProfilesController */
/* @var $data BodyProfiles */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('body_part_name')); ?>:</b>
	<?php echo CHtml::encode($data->body_part_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight_male')); ?>:</b>
	<?php echo CHtml::encode($data->weight_male); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height_male')); ?>:</b>
	<?php echo CHtml::encode($data->height_male); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight_female')); ?>:</b>
	<?php echo CHtml::encode($data->weight_female); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height_female')); ?>:</b>
	<?php echo CHtml::encode($data->height_female); ?>
	<br />

</div>