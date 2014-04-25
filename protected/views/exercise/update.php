<?php
/* @var $this ExerciseController */
/* @var $model Exercise */
?>

<?php

$this->widget('bootstrap.widgets.BsBreadcrumb', array(
		'links' => array(
				'Exercises'=> array('admin'),
				'Update: '.$model->name
		)
));
?>

    <h3>Update Exercise <?php echo $model->name; ?></h3>

<?php $this->renderPartial('_form', array('model' => $model)); ?>