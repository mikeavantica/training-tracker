<?php
/* @var $this ExerciseDetailController */
/* @var $model ExerciseDetail */
?>
<div class="row">
<?php

$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        'Exercise Details' => 'admin',
        'Create'
    )
));

?>
</div>
    <h1>Create ExerciseDetail</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>