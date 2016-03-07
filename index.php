<?php
	$entry=1000;
	for($k=1;$k<=10;$k++){
		
	$ar = range(0,$entry);//only this for best case
	// shuffle($ar);// average case
	// $ar = array_reverse($ar);// worst case
	$co = count($ar);
	$time1 = time();
	// var_dump($ar);
	for($i=1;$i<$co;$i++){
		$element = $ar[$i];
		$j=$i;
		while($j>0 && $ar[$j-1]>$element){
			$ar[$j] = $ar[$j-1];
			$j=$j-1;
		}
		$ar[$j]=$element;
	}
	// var_dump($ar);
	$time_taken = time()-$time1;
	$at[] = array($entry,$time_taken);
	$entry = $entry+1000;
}
//var_dump($at);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>insert</title>
        <!-- import plugin script -->
        <script src='Chart.min.js'></script>
    </head>
    <body>
        <!-- line chart canvas element -->
        <canvas id="buyers" width="600" height="400"></canvas>
        
        <script>
            // line chart data
            var buyerData = {
                labels : [
				<?php
				foreach($at as $key => $val){
					echo $val[0].',';
					// if($i>=10000){}
					// else { echo ','; }
				}
				?>
				],
                datasets : [
                {
                    fillColor : "rgba(172,194,132,0.4)",
                    strokeColor : "#ACC26D",
                    pointColor : "#fff",
                    pointStrokeColor : "#9DB86D",
                    data : [
					<?php 
				foreach($at as $key => $val){
					echo $val[1].',';
					// if($i>=10){}
					// else { echo ','; }
				}
				?>
					]
                }
            ]
            }
            // get line chart canvas
            var buyers = document.getElementById('buyers').getContext('2d');
            // draw line chart
            new Chart(buyers).Line(buyerData);
            
            
        </script>
    </body>
</html>