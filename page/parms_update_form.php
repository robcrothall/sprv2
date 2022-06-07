<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$parm_id = htmlspecialchars(strip_tags($_SESSION["rec_id"]));
	$data = query("select * from parms_char where id = ?", $parm_id); 
	$parm_name = $data[0]["parm_name"]; 
	$parm_value = $data[0]["parm_value"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select username from users where id = ?", $user_id);
	$username = $data[0]["username"];
?>
<h2>Update a parameter</h2>

<form action="../page/parms_update.php" method="post">
    <table class='w3-table-all'>
        <tr>
            <td align="right" width="30%">Parameter Name</td>
            <td><input type='text' name='parm_name' class='form-control' value='<?php echo $parm_name; ?>' /></td>
        </tr>
        <tr>
            <td align="right" width="30%">Parameter Value</td>
            <td><input type='text' name='parm_value' class='form-control' value='<?php echo $parm_value; ?>' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='w3-button w3-green' />
                <a href='parms.php' class='w3-button w3-green'>Back to parameter list</a>
            </td>
        </tr>
    </table>
</form>


