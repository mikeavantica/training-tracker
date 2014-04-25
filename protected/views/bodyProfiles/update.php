<?php
/* @var $this BodyProfilesController */
/* @var $model BodyProfiles */
?>
<div class="row">
<?php
$this->widget('bootstrap.widgets.BsBreadcrumb', array(
		'links' => array(
				'Body Profiles'=> array('admin'),
				'Update: '.$model->body_part_name
		)
));
?>
</div>

    <h1>Update BodyProfiles <?php echo $model->body_part_name; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>