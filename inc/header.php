<!DOCTYPE html>

<html lang="en">

  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <!-- SCRIPTS -->
   <script src="../js/myscripts.js"></script>
   <!-- JQuery -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
    crossorigin="anonymous">
    </script>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" media="print" href="../css/print.css"/>
   <?php if (isset($title)): ?>
    <title><?php echo CLIENT_NAME ?> : <?php echo htmlspecialchars($title) ?>
    </title>
   <?php else: ?>
      <title><?php echo CLIENT_NAME ?></title>
   <?php endif ?>
  </head>

  <body>
    <div class="w3-container">
      <div id="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="center" bgcolor="#5d8eb6" valign="top">
                    <h2><font color="white"><?php echo CLIENT_NAME . " : " . SYSTEM_NAME ?></font></h2>
                </td>
            </tr>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="left" width="50%">User: 
                    <?php echo  $_SESSION["user_surname"] . ", " . $_SESSION["user_first_name"]; ?></td>
                <td align="right" width="50%">Timestamp: <?php echo date("Y-m-d H:i:s T"); ?></td>
            </tr>
        </table>
<?php
require "../inc/menu.php";
?>
       </div>
<?php
if (!empty($message)) {
    echo '<p class="w3-sand">';
    $message = htmlspecialchars($message); 
    print $message; 
    echo '</p>';
}
?>
<div id="middle">
