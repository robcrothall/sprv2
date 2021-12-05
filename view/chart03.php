<?php
require "../conf/config.php"; 
 $_SESSION["module"] = $_SERVER["PHP_SELF"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="utf-8">
   <meta name="viewport" 
     content="width=device-width, initial-scale=1, shrink-to-fit=yes">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <link href="../assets/css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
   <link rel="stylesheet" 
     href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" 
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <?php if (isset($title) ) : ?>
    <title><?php echo CLIENT_NAME ?> : <?= htmlspecialchars($title) ?></title>
   <?php else: ?>
      <title><?= CLIENT_NAME ?></title>
   <?php endif ?>

   <!-- SCRIPTS -->
   <!-- JQuery -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../assets/js/jquery-3.5.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script 
  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
</script>
<script 
  type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
</script>
    <script type="text/javascript">
      google.charts.load('current');   // Don't need to specify chart libraries!
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var wrapper = new google.visualization.ChartWrapper({
          chartType: 'ColumnChart',
          dataTable: [['', 'Germany', 'USA', 'Brazil', 'Canada', 'France', 'RU'],
                      ['', 700, 300, 400, 500, 600, 800]],
          options: {'title': 'Countries'},
          containerId: 'vis_div'
        });
        wrapper.draw();
      }
    </script>
  </head>
  <body style="font-family: Arial;border: 0 none;">
    <div id="vis_div" style="width: 600px; height: 400px;"></div>
  <div id="bottom"><br>
<?php
if (!empty($message)) {
    $message = htmlspecialchars($message); 
    echo '<p class="w3-red">';
    print $message; 
    echo '</p>';
  }
?>
<div>
Copyright &#169; 2019 - 2020 - Settlers Park Association, Horton Road,
 Port Alfred, South Africa
</div>

		</div>
  </body>
</html>
