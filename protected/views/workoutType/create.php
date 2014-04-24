<?php
    /* @var $this WorkoutTypeController */
    /* @var $model WorkoutType */
?>
<div class="row">
<?php
$this->widget('bootstrap.widgets.BsBreadcrumb', array(
		'links' => array(
				'Workout Type'=> 'admin',
				'Create'
		)
));

?>
</div>

<?php echo BsHtml::pageHeader('Create','WorkoutType') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>