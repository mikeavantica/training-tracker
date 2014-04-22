

<?php
$dateschbars = array ();
$fitness = array ();
$volume = array ();
$dataprovider = array ();

$cont = 0;
foreach ( $athlete_stats ["WOD"] as $wod ) {
	
	$cont ++;
	$dateschbars [] = $wod ['date'];
}
// se guardan unicamente las fechas que no estan repetidas
$average_volume = 0;
$average_fitness = 0;
$average_maxsquat = 0;
$average_deadlift = 0;
$average_maxpress = 0;
$dateschbars = array_unique ( $dateschbars );
foreach ( $athlete_stats ["WOD"] as $wod ) {
	$average_volume = $average_volume + $wod ['volume'];
	$average_fitness = $average_fitness + $wod ['fitness'];
	
	$clave = array_search ( $wod ['date'], $dateschbars );
	if (! isset ( $fitness [$clave] )) { // verified if exist
	                              //
		$fitness [$clave] = $wod ['fitness'];
		$volume [$clave] = $wod ['volume'];
	} else {
		$fitness [$clave] = $fitness [$clave] + $wod ['fitness'];
		$volume [$clave] = $wod ['volume'] + $volume [$clave];
	}
} // se guardan y suman los valores de fitness y volumen en las fecha que corresponden

if ($cont > 0) {
	$average_volume = $average_volume / $cont;
	$average_fitness = $average_fitness / $cont;
	
} else {
	$average_volume = 0;
	$average_fitness = 0;
	
}
$rowid = 1; // primary key for my dataprovider
$total_measures = 0;
$total_exercises = 0;

$columns2 = array ();

foreach ( $athlete_stats ['WOD'] as $exerciseswod ) {
	
	$row = array ();
	
	
	$row ['id'] = $rowid;
	$row ['Workout'] = $exerciseswod ['name'];
	$row ['Type'] = $exerciseswod ['type'];
	$row ['Value'] = $exerciseswod ['value'];
	$row ['Date'] = $exerciseswod ['date'];
	$row ['Volume'] = number_format ( $exerciseswod ['volume'], 2 );
	$row ['Fitness'] = number_format ( $exerciseswod ['fitness'], 2 );
	
	$exe = 1; // number of exercises
	$measures = 1; // number of measures
	foreach ( $exerciseswod ['exercises'] as $exercise ) {
		
		$row ['Exercise' . $exe] = $exercise ['name'];
		
		foreach ( $exercise ['prop'] as $measure ) {
			$row ['Measure' . $measures] = $measure ['type'];
			$row ['Value' . $measures] = $measure ['value'];
			$measures ++;
		} // fin del foreach measures
		$exe ++;
		$total_measures = $measures;
		if ($total_measures < $measures) {
			$total_measures = $measures; // definir cantidad de columnas measures
		}
		$total_exercises = $exe;
		if ($total_exercises < $exe) {
			$total_exercises = $exe; // definir cantidad de columnas exercises
		}
	} // fin del foreach de ejercicios
	if ($row ['Volume'] != number_format ( 0, 2 ) && $row ['Fitness'] != number_format ( 0, 2 )) {
		$dataprovider [$rowid] = $row;
	}
	$rowid ++;
} // fin del foreach de workouts
$columns = array ();
// $columns[] ='id';
$columns [] = 'Date';
$columns [] = 'Workout';
$columns [] = 'Type';
$columns [] = 'Value';



$contador = 1;

while ( $total_exercises > $contador ) {
	
	$columns [] = 'Exercise' . $contador;
	$contador ++;
}

$contador = 1;
while ( $total_measures > $contador ) {
	
	$columns [] = 'Measure' . $contador;
	$columns [] = 'Value' . $contador;
	$contador ++;
}
$columns [] = 'Volume';
$columns [] = 'Fitness';

$invoiceItemsDataProvider = new CArrayDataProvider ( $dataprovider );

?>
<div class="row">
	<div class="col-mod-12">
<?php
$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				$athlete_stats['athlete_name'] => array (
						'Athlete/admin' 
				),
				'Stats' 
		) 
) );
?>
					
</div>
</div>
<h1 class="page-header"><?php echo $athlete_stats['athlete_name']; ?></h1>
<div class="row">
	<div class="col-mod-12"></div>
</div>


<div class="row">
	<div class="col-md-2">
		<div class="web-stats success">
			<div class="pull-left">
				<h5><?php echo number_format($average_volume, 2); ?> </h5>
				<span class="description">Average Volume:</span>
			</div>

		</div>
	</div>
	<div class="col-md-2">
		<div class="web-stats info">
			<div class="pull-left">
				<h5><?php echo number_format($average_fitness,2); ?> </h5>
				<span class="description">Average Fitness</span>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="web-stats warning">
			<div class="pull-left">
				<h5><?php echo number_format($athlete_stats["max_squat"], 2); ?> </h5>
				<span class="description">Average Squat</span>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="web-stats danger">
			<div class="pull-left">
				<h5><?php echo number_format($athlete_stats["max_press"], 2); ?> </h5>
				<span class="description">Average Deadlift</span>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="web-stats success">
			<div class="pull-left">
				<h5><?php echo number_format($athlete_stats["max_deadlift"], 2); ?> </h5>
				<span class="description">Average Press:</span>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-archon main-graph">
			<div class="panel-heading">
				<h3 class="panel-title">Graph</h3>
			</div>
			<div class="panel-body">
				<div id="chart1" class="with-3d-shadow with-transitions">	
<?php

$this->widget ( 'chartjs.widgets.ChBars', array (
		'width' => 800,
		'height' => 300,
		'htmlOptions' => array (),
		'labels' => $dateschbars,
		'datasets' => array (
				array (
						"fillColor" => "#04B404",
						"label" => "Fitness",
						"strokeColor" => "rgba(220,220,220,1)",
						"data" => $fitness 
				),
				array (
						"fillColor" => "#2E2EFE",
						"label" => "Volume",
						"strokeColor" => "rgba(220,220,220,1)",
						"data" => $volume 
				) 
		),
		'options' => array () 
) );
?>
									
								
								</div>
			</div>
		</div>
	</div>





</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-archon">
			<div class="panel-heading">
				<h3 class="panel-title">Stats</h3>

			</div>
			<div class="panel-body">
												<?php
												
												$this->widget ( 'bootstrap.widgets.BsGridView', array (
														'id' => 'overallstats-grid',
                                                        'type' => BsHtml::GRID_TYPE_STRIPED,
														'dataProvider' => $invoiceItemsDataProvider,
														'columns' => $columns 
												) );
												
												?>					
											</div>

		</div>
	</div>
</div>





