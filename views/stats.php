<?php ob_start() ?>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);


	function drawChart() {
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'month');
		data.addColumn('number', 'sale');
		data.addRows([
			['<?php echo book::get($graph[0][0])->getLabel() ?>', <?php echo $graph[0][1] ?>],
			['<?php echo book::get($graph[1][0])->getLabel() ?>', <?php echo $graph[1][1] ?>],
			['<?php echo book::get($graph[2][0])->getLabel() ?>', <?php echo $graph[2][1] ?>]
		]);
		
		var options = {
				backgroundColor: 'transparent',
               'title':'Top 3 des meilleurs ventes.'
            };
		
		var chart = new google.visualization.PieChart(document.getElementById('myChart'));
		chart.draw(data,options);
	}
</script>

<div id="myChart" style="width: 100%; height: 500px;"></div>
<?php
	$title = 'BookWorld - Statistiques';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>