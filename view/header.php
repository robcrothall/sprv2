<!DOCTYPE html>

<html lang="en">

  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <!-- SCRIPTS -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-H1KL68YXSC"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      
      gtag('config', 'G-H1KL68YXSC');
    </script>
    <script src="../assets/js/myscripts.js"></script>
   <!-- JQuery -->
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    script src="../assets/js/jquery-3.5.1.min.js"></script>
    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../assets/css/style.css">
   <link rel="stylesheet" media="print" href="../assets/css/print.css"/>
   <?php if (isset($title)): ?>
    <title><?php echo CLIENT_NAME ?> : <?= htmlspecialchars($title) ?></title>
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
