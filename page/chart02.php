<?php
$connection = mysqli_connect('localhost',"ondskyhu_proxy","",'');
$result = msqli_query($connection, "SELECT count(*) from people");
if ($result) {
    echo "Connected";
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chart</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
  </script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses', 'Profit'],
      <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = msqli_fetch_array($result)) {
                echo "['".$row['company']."', '".$row['surname']."']";
            }
        }
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    </script>
</head>
<body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>

</body>
</html>
