<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php echo $content; ?>

    <div class="span-5 last">
        <div id="sidebar">
            <?php

            $this->widget('bootstrap.widgets.BsNav', array(
                'stacked' => true,
                'type' => BsHtml::NAV_TYPE_TABS,
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'operations'),
            ));


            /*$this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Operations',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,

            ));
            $this->endWidget();
    */
            ?>
        </div>
        <!-- sidebar -->
    </div>
<?php $this->endContent(); ?>