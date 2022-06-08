<?php

// configuration
require "../inc/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
?>
<html>
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <link href="../css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <?php if (isset($title)): ?>
    <title><?PHP echo CLIENT_NAME ?> : <?php htmlspecialchars($title) ?></title>
   <?php else: ?>
      <title><?php echo CLIENT_NAME ?></title>
   <?php endif ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Units'],
<?php
if (check_role("RESIDENT")) {

}
//$rows = query("select create_date as `Date`, count(*) as `Created` " .
//"from jobs where create_date > date_add(now(), interval -30 days) order by create_date"
//);
$rows = query("SELECT date(create_date) as Created, count(*) as Jobs FROM `jobs` where create_date > date_add(now(), interval -30 day) group by date(create_date);");
foreach ($rows as $row) { 
    echo "['" . $row["Created"] . "', " . $row["Jobs"] . "],\r";
} 
    echo "['', 0]\n\r";
?>
        ]);
        var options = {
          title : 
<?php
echo "'Tasks created, by day'";
?>,
          vAxis: {title: 'Tasks'},
          hAxis: {title: 'Created'},
          seriesType: 'bars',
          series: {1: {type: 'line'}}        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div class="w3-container">
       <div id="top">
     	    <table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td align="center" bgcolor="#5d8eb6" valign="top">
						<h1><font color="white"><?= CLIENT_NAME ?><br><?= SYSTEM_NAME ?></font></h1>
					</td>
				</tr>
	       </table>
	       <table border="0" cellpadding="0" cellspacing="0" width="100%">
	         <tr>
		        <td align="left" width="50%">User: <?php echo $_SESSION["user_first_name"] . " " . $_SESSION["user_surname"]; ?> </td>
		        <td align="right" width="50%">Timestamp: <?php echo date("Y-m-d H:i:s T"); ?></td>
	         </tr>
	       </table>
	       <hr>
		 	 <?php
				require("../inc/menu.php");
		 	 ?>
		 	 <hr>
       </div>
    				<?php
						if(!empty($message)) {
//							echo '<p class="text-danger">';
    						$message = htmlspecialchars($message); 
    						print $message; 
//							echo '</p>';
    					}
    				?>
       <div id="middle"></div>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
<div id="bottom">
<br>
<?php
	if(!empty($message)) {
		$message = htmlspecialchars($message); 
		echo '<p class="w3-red">';
		print $message; 
		echo '</p>';
	}
?>
            <div>
                Copyright &#169; 2019 - 2020 - Settlers Park Association, Horton Road, Port Alfred, South Africa
            </div>

		</div>
  </body>
</html>

