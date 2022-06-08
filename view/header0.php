<!DOCTYPE html>

<html lang="en">

  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	-->
	<!-- Latest compiled and minified JavaScript 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	-->
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- Bootstrap core CSS -->
   <link href="../css/bootstrap.min.css" rel="stylesheet">  
   <link href="../css/bootstrap.css" rel="stylesheet">
   <!-- Material Design Bootstrap -->
   <!--link href="../css/mdb.min.css" rel="stylesheet">
   <!-- Your custom styles (optional) -->
   <!-- link href="../css/style.css" rel="stylesheet"-->
   <link href="../css/bootstrap-theme.min.css" rel="stylesheet"/>
   <!--link href="../css/styles.css" rel="stylesheet"/ --> 

   <?php if (isset($title)): ?>
   	<title><?= CLIENT_NAME ?> : <?= htmlspecialchars($title) ?></title>
   <?php else: ?>
      <title><?= CLIENT_NAME ?></title>
   <?php endif ?>

   <!-- SCRIPTS -->
   <!-- JQuery -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--    <script type="text/javascript" src="../public/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
<!--    <script type="text/javascript" src="../public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
<!--    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
<!--    <script type="text/javascript" src="../public/js/mdb.min.js"></script>
	 <!-- Local scripts -->
<!--    <script src="../js/scripts.js"></script> -->
  </head>

  <body>
    <div class="container" width="100%">
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
		        <td align="left" width="50%">User: <?php echo $_SESSION["user_first_name"] . " " . $_SESSION["user_surname"] ?> </td>
		        <td align="right" width="50%">Timestamp: <?php echo date("Y-m-d H:i:s T"); ?></td>
	         </tr>
	       </table>
	       <hr>
		 	 <?php
    			require("../inc/menu.php");
		 	 ?>
		 	 <hr>
       </div>
				<p class="text-danger">
    				<?php
						if(!empty($message)) {
    						$message = htmlspecialchars($message); 
    						print $message; 
    					}
    				?>
				</p>

       <div id="middle">
