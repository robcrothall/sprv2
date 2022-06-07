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
$phone_file  = $_SESSION["hroom_file"];
$trans_file  = $_SESSION["trans_file"];
?>
<h2>Hibiscus Room billing for current month</h2>
<h3 align="left">Please select:</h3>
<form action="../page/hroom.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="50000" />
   <table cellspacing=0 cellpadding=4>
        <tr>
            <td><label for="mnth">Month number (1 to 12):</label></td>
            <td><input type="number" id="mnth" name="mnth" 
                size=4 step=1 min=1 max=12 required autofocus 
                value="<?php echo $mnth; ?>"></td>
        </tr>
        <tr>
            <td><label for="readingdate">Billing date:</label></td>
            <td><input type="date" id="readingdate" name="readingdate" required 
                value="<?php echo date("Y-m-d", $reading_date); ?>"></td>
        </tr>
        <tr>
            <td><label for="hroom_file">Tab-delimited Hibiscus Room file: </label>
            </td>
            <td><input type="file" id="hroom_file" name="hroom_file" 
                accept=".txt"></td>
        </tr>
    </table>
    <input type="submit">
</div>
<?php
    
?>
