<?php
/* @var $this BodyProfilesController */
/* @var $data BodyProfiles */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('body_part__name')); ?>:</b>
	<?php echo CHtml::encode($data->body_part__name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex_typeid')); ?>:</b>
	<?php echo CHtml::encode($data->sex_typeid); ?>
	<br />


</div>