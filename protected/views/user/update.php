<?php
    /* @var $this UserController */
    /* @var $model User */
?>
<div class="row">
<?php
 $this->widget('bootstrap.widgets.BsBreadcrumb', array(
            'links' => array(
             'Users'=> array('admin'),
              'Update: '.$model->username
            )
        ));
    ?>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>