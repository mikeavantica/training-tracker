<?php
/* @var $this BodyProfilesController */
/* @var $model BodyProfiles */
?>
<div class="row">
<?php

$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        'Body Profiles' => 'admin',
        'Create'
    )
));


?>
</div>


<?php $this->renderPartial('_form', array('model' => $model)); ?>