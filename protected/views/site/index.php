<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php 
$this->widget ( 'bootstrap.widgets.TbHeroUnit', array (
		'heading' => 'Welcome To ' . CHtml::encode ( Yii::app ()->name ) . '!!',
 		'content' => '<p>you can navigate in our web page and enjoy all their facilities</p>', //. TbHtml::linkButton('HOLA',array(
        //'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_LARGE,
        //'icon' => TbHtml::ICON_REMOVE_SIGN,
        //'url' => array('student/index')
              
          //  )),

) );
?>
