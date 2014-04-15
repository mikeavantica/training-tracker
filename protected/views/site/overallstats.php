<div style="text-align: center;"><h1>Overall Stats</h1></div>
<?php
$dateschbars = array ();
$fitness = array();
$volume = array();
$dataprovider = array ();
foreach($athlete_stats['Athlete'] as $grafic){
foreach ( $grafic ["WOD"] as $wod ) {
	
	
	$dateschbars [] = $wod ['date'];

} 
}// se guardan unicamente las fechas que no estan repetidas
$dateschbars = array_unique($dateschbars);
foreach($athlete_stats['Athlete'] as $grafic){
	foreach ( $grafic ["WOD"] as $wod ) {
	    
		$clave = array_search($wod['date'], $dateschbars);
		if(!isset($fitness[$clave])){ //verified if exist
			$fitness[$clave] = $wod['fitness'];
			$volume[$clave] = $wod['volume'];
			
		}else{
			$fitness[$clave] = $fitness[$clave] + $wod['fitness'];
			$volume[$clave] = $wod['volume'] + $volume[$clave];
		}
	
	
		
		
	    
	}
}// se guardan y suman los valores de fitness y volumen en las fecha que corresponden
$rowid = 1; //primary key needed to the dataprovider
$total_measures =0;
$total_exercises = 0;
$average_volume = 0;
$average_fitness = 0;
$max_squat = 0;
$max_deadlift = 0;
$max_press = 0;
$cont = 0; //variable needed to define average
foreach($athlete_stats['Athlete'] as $athlete)
{   
	$average_volume += $athlete['average_volume'];
	$average_fitness += $athlete['average_fitness'];
	$max_squat += $athlete['max_squat'];
	$max_press += $athlete['max_press'];
	$max_deadlift += $athlete['max_deadlift'];
foreach ( $athlete['WOD'] as $exerciseswod ) {
	
	$row = array ();
	
	
	$row['id'] = $rowid;
	$row['Athlete'] = $athlete['athlete_name'];
	$row ['Workout'] = $exerciseswod ['name'];
	$row['Type'] = $exerciseswod['type'];
	$row ['Value'] = $exerciseswod ['value'];
	$row['Date'] = $exerciseswod['date'];
	$row ['Volume'] = number_format($exerciseswod ['volume'], 2);
	$row ['Fitness'] = number_format($exerciseswod ['fitness'], 2);
	
	$exe = 1; //numer of exercises
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
$cont++;
}//fin del foreach de atletas
/*
 * se calcula el average para todos;
 * */
if($cont == 0){
	$cont = 1;//if rows are 0
	
}
$average_volume = $average_volume/$cont;
$average_fitness = $average_fitness/$cont;
$max_squat = $max_squat/$cont;
$max_press = $max_press/$cont;
$max_deadlift = $max_deadlift/$cont;
/************************************************/

$columns = array();
//$columns[] ='id';
$columns[] = 'Date';
$columns[] = 'Athlete';
$columns[] = 'Workout';
$columns[] = 'Type';
$columns[] = 'Value';



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
 ?>
<div>

	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;" > <b>Average Volume:</b> <h4><?php echo number_format($average_volume, 2); ?> </h4> </div>
	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;"> <b>Average Fitness:</b><h4> <?php echo number_format($average_fitness, 2); ?></h4></div>
	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;"> <b>Max Squat:</b> <h4><?php echo number_format($max_squat, 2); ?></h4></div>
	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;"> <b>Max Press:</b> <h4><?php echo number_format($max_press, 2); ?></h4> </div>
	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;"> <b>Max Deadlift:</b> <h4><?php echo number_format($max_deadlift, 2); ?></h4></div>
	<div>
<?php 
$invoiceItemsDataProvider = new CArrayDataProvider ( $dataprovider );
$this->widget ( 'chartjs.widgets.ChBars', array (
		'width' => 900,
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

	
<?php
$this->widget('bootstrap.widgets.BsGridView',array(
'id'=>'overallstats-grid',
'dataProvider'=>$invoiceItemsDataProvider ,
 'columns'=>$columns,
));

?>
</div>