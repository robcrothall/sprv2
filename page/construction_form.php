<?php
/**
 * Program: construction form
 * 
 * Display graphic indicating that the function is under construction.
 * php version 7.2.10
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id> 
 * @link     http://www.sprv.co.za
 */
require "../inc/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
require "../inc/head.php";
require "../inc/body.php";
require "../inc/menu.php";
require "../inc/msg.php";
//require "../inc/db_open.php";
//echo '<h1>List of asset types</h1>';
?>
<div>
<img src="../img/construction.gif" alt="Under construction">
</div>