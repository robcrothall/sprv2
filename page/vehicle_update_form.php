<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$country_id = htmlspecialchars(strip_tags($_SESSION["rec_id"]));
	$data = query("select * from countries where id = ?", $country_id); 
	$country = $data[0]["country"]; 
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select username from users where id = ?", $user_id);
	$username = $data[0]["username"];
?>
<h2>Update a Country</h2>

<form action="../page/country_update.php" method="post">
    <table class='w3-table-all'>
        <tr>
            <td>Name <input type="hidden" id="rec_id" name="rec_id" value="<?php echo $id; ?>" /></td>
            <td><input type='text' name='name' class='form-control' value='<?php echo $country; ?>' /></td>
        </tr>
        <tr>
            <td>Notes on this country</td>
            <td><textarea name='notes' class='form-control' rows="4" cols="50"><?php echo $notes; ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='w3-button w3-green' />
                <a href='country.php' class='w3-button w3-green'>Back to countries</a>
            </td>
        </tr>
    </table>
</form>


