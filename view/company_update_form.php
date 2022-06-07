<?php
/**
 * Company Update
 * 
 * Update company details
 * PHP Version 7.1
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git-id>
 * @link     http://www.sprv.co.za
 */

$_SESSION["module"] = $_SERVER["PHP_SELF"];
$company_id = htmlspecialchars(strip_tags($_SESSION["rec_id"]));
$data = query("select * from company where id = ?", $company_id); 
$co_name = $data[0]["co_name"]; 
$co_address = $data[0]["co_address"]; 
$notes = $data[0]["notes"];
$user_id = $data[0]["user_id"];
$changed = $data[0]["changed"];
$data = query("select username from users where id = ?", $user_id);
$username = $data[0]["username"];
?>
<h2>Update a Company</h2>

<form action="../page/company_update.php" method="post">
<input type='submit' value='Save' class='w3-button w3-green' />
<a href='company.php' class='w3-button w3-green'>Back to companies</a>
    <table class='w3-table-all'>
        <tr>
            <td>Name <input type="hidden" id="rec_id" name="rec_id" value="<?php echo $id; ?>" /></td>
            <td><input type='text' name='co_name' class='form-control' size='50' value='<?php echo $co_name; ?>' /></td>
        </tr>
        <tr>
        <td>Address</td>
            <td><input type='text' name='co_address' class='form-control' size='50' value='<?php echo $co_address; ?>' /></td>
        </tr>
        <tr>
            <td>Notes on this company</td>
            <td><textarea name='notes' class='form-control' rows="4" cols="50"><?php echo $notes; ?></textarea></td>
        </tr>
    </table>
<input type='submit' value='Save' class='w3-button w3-green' />
<a href='company.php' class='w3-button w3-green'>Back to companies</a>
</form>
