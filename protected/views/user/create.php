<?php
    /* @var $this UserController */
    /* @var $model User */
?>
<div class="row">
<?php

        $this->widget('bootstrap.widgets.BsBreadcrumb', array(
            'links' => array(
             'Users'=> 'admin',
                'Create'
            )
        ));

   
    ?>
    </div>

<?php echo BsHtml::pageHeader('Create','User') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>