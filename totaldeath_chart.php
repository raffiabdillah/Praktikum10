<?php
include('koneksi1.php');
$label = ["India","Japan","S.Korea","Turkey","Vietnam","Taiwan","Iran","Indonesia","Malaysia","Israel"];

for($covid = 1; $covid < 11; $covid++)
{
	$query = mysqli_query($koneksi,"select sum(total_deaths) as total_cases from covid_data where id='$covid'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['total_cases'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px; height: 400px; display: inline-block;">
		<canvas id="lineChart"></canvas>
	</div>

	<div style="width: 800px; height: 400px; display: inline-block;">
		<canvas id="barChart"></canvas>
	</div>

	<div style="width: 800px; height: 400px; display: inline-block;">
		<canvas id="pieChart"></canvas>
	</div>

	<div style="width: 800px; height: 400px; display: inline-block;">
		<canvas id="doughnutChart"></canvas>
	</div>

	<script>
		var ctx1 = document.getElementById("lineChart").getContext('2d');
		var lineChart = new Chart(ctx1, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Grafik deaths by Covid',
					data: <?php echo json_encode($jumlah_produk); ?>,
					borderColor: 'blue',
					fill: false
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});

		var ctx2 = document.getElementById("barChart").getContext('2d');
		var barChart = new Chart(ctx2, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Grafik deaths by Covid',
					data: <?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: 'rgba(75, 192, 192, 0.2)',
					borderColor: 'rgba(75, 192, 192, 1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});

		var ctx3 = document.getElementById("pieChart").getContext('2d');
		var pieChart = new Chart(ctx3, {
			type: 'pie',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Presentase kematian',
					data: <?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(255, 159, 64, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 99, 255, 0.2)',
						'rgba(54, 162, 64, 0.2)',
						'rgba(255, 206, 153, 0.2)',
						'rgba(75, 192, 128, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(255, 159, 64, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 99, 255, 1)',
						'rgba(54, 162, 64, 1)',
						'rgba(255, 206, 153, 1)',
						'rgba(75, 192, 128, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				responsive: true
			}
		});

		var ctx4 = document.getElementById("doughnutChart").getContext('2d');
		var doughnutChart = new Chart(ctx4, {
			type: 'doughnut',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Presentase kematian',
					data: <?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(255, 159, 64, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 99, 255, 0.2)',
						'rgba(54, 162, 64, 0.2)',
						'rgba(255, 206, 153, 0.2)',
						'rgba(75, 192, 128, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(255, 159, 64, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 99, 255, 1)',
						'rgba(54, 162, 64, 1)',
						'rgba(255, 206, 153, 1)',
						'rgba(75, 192, 128, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				responsive: true
			}
		});
	</script>
</body>
</html>
