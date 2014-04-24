<?php
    /* @var $this WorkoutTypeController */
    /* @var $model WorkoutType */
?>
<div class="row">
<?php
$this->widget('bootstrap.widgets.BsBreadcrumb', array(
            'links' => array(
             'Workout Type'=> array('admin'),
                'Update: '.$model->name
            )
        ));

    ?>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>