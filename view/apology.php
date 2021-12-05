<?php
/**
 * Program: apology.php
 * 
 * Display an error message.
 * php version 7.2.10
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id> 
 * @link     http://www.sprv.co.za
 * @PHP      7.1
 */
?>
<p class="lead text-danger">
    Sorry!
</p>
<p class="text-danger">
<?php
echo $message;
$message = '';
?>
</p>

<a href="javascript:history.go(-1);" class='w3-button w3-green'>Back</a>
