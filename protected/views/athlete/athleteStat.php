
<div style="text-align: center;"><h1><?php echo $athlete_stats['athlete_name']; ?></h1></div>
<div>

	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;" > <b>Average Volume:</b> <h3><?php echo $athlete_stats["average_volume"] ?> </h3> </div>
	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;"> <b>Average Fitness:</b><h3> <?php echo $athlete_stats["average_fitness"] ?></h3></div>
	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;"> <b>Max Squat:</b> <h3><?php echo $athlete_stats["max_squat"] ?></h3></div>
	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;"> <b>Max Press:</b> <h3><?php echo $athlete_stats["max_press"] ?></h3> </div>
	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;"> <b>Max Deadlift:</b> <h3><?php echo $athlete_stats["max_deadlift"] ?></h3></div>
	<div>
<?php
$dateschbars = array ();
$fitness = array ();
$volume = array ();
$dataprovider = array ();

foreach ( $athlete_stats ["WOD"] as $wod ) {


	$dateschbars [] = $wod ['date'];

}
// se guardan unicamente las fechas que no estan repetidas
$dateschbars = array_unique($dateschbars);
	foreach ( $athlete_stats ["WOD"] as $wod ) {

		$clave = array_search($wod['date'], $dateschbars);
		if(!isset($fitness[$clave])){ //verified if exist
			$fitness[$clave] = $wod['fitness'];
			$volume[$clave] = $wod['volume'];
				
		}else{
			$fitness[$clave] = $fitness[$clave] + $wod['fitness'];
			$volume[$clave] = $wod['volume'] + $volume[$clave];
		}




	  
	}// se guardan y suman los valores de fitness y volumen en las fecha que corresponden

$rowid = 1; //primary key for my dataprovider
$total_measures =0;
$total_exercises = 0;
$columns2 = array();
foreach ( $athlete_stats ['WOD'] as $exerciseswod ) {
	
	$row = array ();
	
	// $dataprovider[] = $athlete['athlete_name'];
	$row['id'] = $rowid;
	$row ['Workout'] = $exerciseswod ['name'];
	$row['Type'] = $exerciseswod['type'];
	$row ['Value'] = $exerciseswod ['value'];
	$row['Date'] = $exerciseswod['date'];
	$row ['Volume'] = $exerciseswod ['volume'];
	$row ['Fitness'] = $exerciseswod ['fitness'];
	
	$exe = 1; //number of exercises
	$measures= 1; //number of measures
	foreach ( $exerciseswod ['exercises'] as $exercise ) {
		
		$row ['Exercise'.$exe] = $exercise ['name'];
		
		foreach ( $exercise ['prop'] as $measure ) {
			$row ['Measure'.$measures] = $measure ['type'];
			$row ['Value'.$measures] = $measure ['value'];
			$measures++;
		}//fin del foreach measures
		$exe++; 
		$total_measures = $measures;
		if ($total_measures  < $measures) {
			$total_measures = $measures;//definir cantidad de columnas measures
			
		}
		$total_exercises = $exe;
		if ($total_exercises  < $exe) {
			$total_exercises = $exe;//definir cantidad de columnas exercises
		}
		
	} // fin del foreach de ejercicios
	
	$dataprovider[$rowid] = $row;
	$rowid++;
} // fin del foreach de workouts
$columns = array();
//$columns[] ='id';
$columns[] = 'Date';
$columns[] = 'Workout';
$columns[] = 'Type';
$columns[] = 'Value';


//var_dump($total_measures);

$contador = 1;

while($total_exercises > $contador){
  
	$columns[]= 'Exercise'.$contador;
	$contador++;
	
	
	
}

$contador = 1;
while ($total_measures > $contador){
   
	$columns[]= 'Measure'.$contador;
	$columns[]= 'Value'.$contador;
	$contador++;
	
	
	
}
$columns[] = 'Volume';
$columns[] = 'Fitness';

$invoiceItemsDataProvider = new CArrayDataProvider ( $dataprovider );
$this->widget ( 'chartjs.widgets.ChBars', array (
		'width' => 600,
		'height' => 300,
		'htmlOptions' => array (),
		'labels' => $dateschbars,
		'datasets' => array (
				array (
						"fillColor" => "#ff00ff",
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
	
<?php
$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'overallstats-grid',
'dataProvider'=>$invoiceItemsDataProvider ,
 'columns'=>$columns,
));

?>



</div>