<!DOCTYPE html>

<html lang="en">

  <head>
   <meta charset="utf-8">
   <meta name="viewport" 
   content="width=device-width, initial-scale=1, shrink-to-fit=yes">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <!-- SCRIPTS -->
   <script src="../assets/js/myscripts.js"></script>
   <!-- JQuery -->
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="../assets/js/jquery-3.5.1.min.js"></script>
   <!-- Latest compiled and minified Bootstrap JavaScript -->
   <script 
      src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
   </script>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
   <link rel="stylesheet" 
   href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" 
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../assets/css/style.css">
   <link rel="stylesheet" media="print" href="../assets/css/print.css"/>
<?php 
if (isset($title)) {
    echo "<title>";
    echo "CLIENT_NAME : " . htmlspecialchars($title) . "</title>";
} else {
    echo "<title>" . CLIENT_NAME . "</title>";
}
