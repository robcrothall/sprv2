<!DOCTYPE html>

<html lang="en">

  <head>
   <meta charset="utf-8">
   <meta name="viewport" 
   content="width=device-width, initial-scale=1, shrink-to-fit=yes">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <!-- SCRIPTS -->
   <script src="../js/myscripts.js"></script>
   <!-- JQuery -->
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="../js/jquery-3.5.1.min.js"></script>
   <!-- Latest compiled and minified Bootstrap JavaScript -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
    crossorigin="anonymous">
</script>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
   <link rel="stylesheet" 
   href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" 
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" media="print" href="../css/print.css"/>
<?php 
if (isset($title)) {
    echo "<title>";
    echo "CLIENT_NAME : " . htmlspecialchars($title) . "</title>";
} else {
    echo "<title>" . CLIENT_NAME . "</title>";
}
