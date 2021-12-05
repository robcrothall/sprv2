<!DOCTYPE html>
<html>
<?php
require("../conf/config.php"); 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
?>
<head>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <link href="../assets/css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <?php if (isset($title)): ?>
    <title><?php echo CLIENT_NAME ?> : <?php echo htmlspecialchars($title) ?></title>
   <?php else: ?>
      <title><?php echo CLIENT_NAME ?></title>
   <?php endif ?>

   <!-- SCRIPTS -->
   <!-- JQuery -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../assets/js/jquery-3.5.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ["orgchart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Name');
            data.addColumn('string', 'Manager');
            data.addColumn('string', 'ToolTip');

            // For each orgchart box, provide the name, manager, and tooltip to show.
            data.addRows([
                ['Settlers Park Association Board', '', 'Elected by the Residents'],
                [{
                        'v': 'Derek Thompson',
                        'f': 'Derek Thompson<div style="color:red; font-style:italic">General Manager</div>'
                    },
                    'Settlers Park Association Board', 'General Manager'
                ],
                [{
                        'v': 'Sr Erica Botha',
                        'f': 'Sr Erica Botha<div style="color:red; font-style:italic">Care</div>'
                    },
                    'Derek Thompson', 'Care Manager'
                ],
                [{
                        'v': 'Johan Wolmarans',
                        'f': 'Johan Wolmarans<div style="color:red; font-style:italic">Facilities</div>'
                    },
                    'Derek Thompson', 'Facilities Manager'
                ],
                [{
                        'v': 'Kittie Joubert',
                        'f': 'Kittie Joubert<div style="color:red; font-style:italic">Finance</div>'
                    },
                    'Derek Thompson', 'Finance'
                ],
                [{
                        'v': 'Danielle Fourie',
                        'f': 'Danielle Fourie<div style="color:red; font-style:italic">Hibiscus Room</div>'
                    },
                    'Derek Thompson', 'Hibiscus Room Supervisor'
                ],
                [{
                        'v': 'Sue Croukamp',
                        'f': 'Sue Croukamp<div style="color:red; font-style:italic">Sales and Marketing</div>'
                    },
                    'Derek Thompson', 'Sales and Marketing'
                ],
                [{
                        'v': 'Irene Marais',
                        'f': 'Irene Marais<div style="color:red; font-style:italic">Systems and Administration</div>'
                    },
                    'Derek Thompson', 'Systems and Administration'
                ]
            ]);

            // Create the chart.
            var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
            // Draw the chart, setting the allowHtml option to true for the tooltips.
            chart.draw(data, {
                'allowHtml': true
            });
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
		        <td align="left" width="50%">User: <?php echo $_SESSION["user_first_name"] . " " . $_SESSION["user_surname"] . " [" . $_SESSION["user_role"] . "]"; ?> </td>
		        <td align="right" width="50%">Timestamp: <?php echo date("Y-m-d H:i:s T"); ?></td>
	         </tr>
	       </table>
	       <hr>
		 	 <?php
    			require("../view/menu.php");
		 	 ?>
		 	 <hr>
       </div>
    <div id="chart_div"></div>
</div>
</body>

</html>