<?php

    // configuration
	require("../inc/config.php"); 
	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$message = "";
	if(empty($_SESSION["selected_people_id"])) {
//			$message .= "Please select 'Read' on the person before looking here";
//			$message .= " SESSION[id]: " . $_SESSION["id"];
			$sql = "select person_id from users where id = ?";
			$rows = query($sql,$_SESSION["id"]);
			$_SESSION["selected_people_id"] = $rows[0]["person_id"];
//			$message .= " Selected: " . $_SESSION["selected_people_id"];
//			$sql = "select surname, first_name from people where id = ?";
//			$rows = query($sql,$_SESSION["selected_people_id"]);
//			$_SESSION["user_surname"] = $rows[0]["surname"];
//			$_SESSION["user_first_name"] = $rows[0]["first_name"];
//			$message .= " First name: " . $_SESSION["user_first_name"];
//			$message .= " Surname: " . $_SESSION["user_surname"] . " Count of rows: " . count($rows);
	}
//	var_dump($message);
//	var_dump($_SESSION);

?>
<html>
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <link href="../assets/css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <?php if (isset($title)): ?>
   	<title><?= CLIENT_NAME ?> : <?= htmlspecialchars($title) ?></title>
   <?php else: ?>
      <title><?= CLIENT_NAME ?></title>
   <?php endif ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Units'],
		<?php
		$rows = query("select surname, first_name, cottage from people where id = ?", $_SESSION["selected_people_id"]);
		$cottage = $rows[0]["cottage"];
		if(check_role("RESIDENT")) {
        if ($_SESSION["user_surname"] . $_SESSION["user_first_name"] <> $rows[0]["surname"] . $rows[0]["first_name"]) {
		   $cottage = 0;
			$message .= "Residents may only see their own electricity usage";
//			$message .= $_SESSION["user_surname"] . $_SESSION["user_first_name"] . " - " . $rows[0]["surname"] . $rows[0]["first_name"];
			}
	    }
		$rows = query("select reading_date as `Date`, (close_reading - open_reading) as `Units` " .
			"from electricity where meter = '$cottage' " .
			"and reading_date > date_add(now(), interval -2 year) order by reading_date"
		);
		foreach ($rows as $row){ 
			echo "['" . $row["Date"] . "', " . $row["Units"] . "],\r";
		} 
        echo "['', 0]\n\r";
		?>
        ]);
        var options = {
          title : 
		  <?php
			echo "Monthly Electricity Consumption for Cottage $cottage";
		  ?>,
          vAxis: {title: 'Units'},
          hAxis: {title: 'Month'},
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
		        <td align="left" width="50%">User: <?php echo $_SESSION["user_surname"] . ", " . $_SESSION["user_first_name"]; ?> </td>
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
//		echo '<p class="w3-red">';
		print $message; 
//		echo '</p>';
	}
?>
            <div>
                Copyright &copy; 2019 - <?php echo date("Y");?> - Settlers Park Association, Horton Road, Port Alfred, South Africa
            </div>

		</div>
  </body>
</html>

