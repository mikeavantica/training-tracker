<div>
<?php

$this->widget(
		'chartjs.widgets.ChBars',
		array(
				'width' => 600,
				'height' => 300,
				'htmlOptions' => array(),
				'labels' => array("January","February","March","April","May","June"),
				'datasets' => array(
						array(
								"fillColor" => "#ff00ff",
								"strokeColor" => "rgba(220,220,220,1)",
								"data" => array(10, 20, 30, 40, 50, 60)
						)
				),
				'options' => array()
		)
);
?>
</div>