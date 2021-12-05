<?php
/**
 * Program: elec_form
 * 
 * Prepare to collect electricity data.
 * php version 5
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */
$_SESSION["module"] = $_SERVER["PHP_SELF"];
$mnth        = $_SESSION["mnth"];
$accperiod   = $_SESSION["accperiod"];
$readingdate = $_SESSION["readingdate"];
$mnth_c      = $_SESSION["mnth_c"];
$yr          = $_SESSION["yr"];
$yr_c        = $_SESSION["yr_c"];
$phone_file  = $_SESSION["elec_file"];
$trans_file  = $_SESSION["trans_file"];
?>
<h2 align="center">Electricity account for current month</h2>
<h3 align="left">Please select:</h3>
<form action="../ctl/elec.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="50000" />
   <table cellspacing=0 cellpadding=4>
        <tr>
            <td><label for="mnth">Month number (1 to 12):</label></td>
            <td><input type="number" id="mnth" name="mnth" 
                size=4 step=1 min=1 max=12 required autofocus 
                value="<?php echo $mnth; ?>"></td>
        </tr>
        <tr>
            <td><label for="readingdate">Reading date:</label></td>
            <td><input type="date" id="readingdate" name="readingdate" required></td>
        </tr>
        <tr>
            <td><label for="elec_file">Tab-delimited Electricity file: </label></td>
            <td><input type="file" id="elec_file" name="elec_file" accept=".txt">
            </td>
        </tr>
    </table>
    <input type="submit">
</div>
<?php
    
?>
