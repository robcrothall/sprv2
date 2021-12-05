<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Elec', 'Phone'],
          ['2020-01', 1000, 400],
          ['2020-02', 1170, 460],
          ['2020-03', 660, 1120],
          ['2020-04', 1030, 540]
        ]);

        var options = {
          chart: {
            title: 'Settlers Park Utilities Trend',
            subtitle: 'Electricity and Phone',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
