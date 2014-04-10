<div style="text-align: center;"><h1>Overall Stats</h1></div>
<?php
$dateschbars = array ();
$fitness = array ();
$volume = array ();
$dataprovider = array ();
foreach($athlete_stats['Athlete'] as $grafic){
foreach ( $grafic ["WOD"] as $wod ) {
	// print "<pre>";
	// print_r ( $wod["name"] );
	// print "</pre>";
	
	$dateschbars [] = $wod ['date'];
	$fitness [] = $wod ['fitness'];
	$volume [] = $wod ['volume'];
} 
}// grafica
$x = 1;
$total_measures =0;
$total_exercises = 0;
$average_volume = 0;
$average_fitness = 0;
$max_squat = 0;
$max_deadlift = 0;
$max_press = 0;
$cont = 0;
foreach($athlete_stats['Athlete'] as $athlete)
{
	$average_volume += $athlete['average_volume'];
	$average_fitness += $athlete['average_fitness'];
	$max_squat += $athlete['max_squat'];
	$max_press += $athlete['max_press'];
	$max_deadlift += $athlete['max_deadlift'];
foreach ( $athlete['WOD'] as $exerciseswod ) {
	
	$row = array ();
	
	
	$row['id'] = $x;
	$row['Athlete'] = $athlete['athlete_name'];
	$row ['Workout'] = $exerciseswod ['name'];
	$row['Type'] = $exerciseswod['type'];
	$row ['Value'] = $exerciseswod ['value'];
	$row['Date'] = $exerciseswod['date'];
	$row ['Volume'] = $exerciseswod ['volume'];
	$row ['Fitness'] = $exerciseswod ['fitness'];
	
	$i = 1;
	$y= 1;
	foreach ( $exerciseswod ['exercises'] as $exercise ) {
		
		$row ['Exercise'.$i] = $exercise ['name'];
		
		foreach ( $exercise ['prop'] as $measure ) {
			$row ['Measure'.$y] = $measure ['type'];
			$row ['Value'.$y] = $measure ['value'];
			$y++;
		}//fin del foreach measures
		$i++; 
		$total_measures = $y;
		if ($total_measures  < $y) {
			$total_measures = $y;//definir cantidad de columnas measures
		}
		$total_exercises = $i;
		if ($total_exercises  < $i) {
			$total_exercises = $i;//definir cantidad de columnas exercises
		}
		
	} // fin del foreach de ejercicios
	
	$dataprovider[$x] = $row;
	$x++;
} // fin del foreach de workouts
$cont++;
}//fin del foreach de atletas
/*
 * se calcula el average para todos;
 * */

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
while($total_exercises > 0){
	$columns[]= 'Exercise'.$contador;
	$total_exercises = $total_exercises - $contador;
	$contador++;
}

$contador = 1;
while ($total_measures > 0){
	$columns[]= 'Measure'.$contador;
	$columns[]= 'Value'.$contador;
	$total_measures = $total_measures - $contador;
	$contador++;
	
}
$columns[] = 'Volume';
$columns[] = 'Fitness';
 ?>
<div>

	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;" > <b>Average Volume:</b> <h3><?php echo $average_volume; ?> </h3> </div>
	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;"> <b>Average Fitness:</b><h3> <?php echo $average_fitness; ?></h3></div>
	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;"> <b>Max Squat:</b> <h3><?php echo $max_squat; ?></h3></div>
	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;"> <b>Max Press:</b> <h3><?php echo $max_press; ?></h3> </div>
	<div class="span2" style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;"> <b>Max Deadlift:</b> <h3><?php echo $max_deadlift; ?></h3></div>
	<div>
<?php 
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
	<div class="span3">
<?php
$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'overallstats-grid',
'dataProvider'=>$invoiceItemsDataProvider ,
 'columns'=>$columns,
));

?>

</div>

</div>