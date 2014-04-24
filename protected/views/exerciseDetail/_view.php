<?php
/* @var $this ExerciseDetailController */
/* @var $data ExerciseDetail */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('attr1')); ?>:</b>
    <?php echo CHtml::encode($data->attr1); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('attr2')); ?>:</b>
    <?php echo CHtml::encode($data->attr2); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('attr3')); ?>:</b>
    <?php echo CHtml::encode($data->attr3); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('attr4')); ?>:</b>
    <?php echo CHtml::encode($data->attr4); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('attr5')); ?>:</b>
    <?php echo CHtml::encode($data->attr5); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('attr6')); ?>:</b>
    <?php echo CHtml::encode($data->attr6); ?>
    <br/>

    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('attr7')); ?>:</b>
	<?php echo CHtml::encode($data->attr7); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('body_profilesId')); ?>:</b>
	<?php echo CHtml::encode($data->body_profilesId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exerciseid')); ?>:</b>
	<?php echo CHtml::encode($data->exerciseid); ?>
	<br />

	*/
    ?>

</div>