<?php
/**
 * Program: Register_form
 * 
 * Register a new user.
 * php version 5
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */
?>
<div class="w3-container">
<form class="form-control full-width" action="../page/register.php" method="post">
    <fieldset>
        <div class="form-group">
            Username:<br>
            <input autofocus class="form-control full-width" style="width: 100%"
             name="username" type="text"/>
        </div>
        <div class="form-group">
                Password:<br>
            <input class="form-control full-width" style="width: 100%"
             name="password" type="password"/>
        </div>
        <div class="form-group">
                Re-enter password:<br>
            <input class="form-control" style="width: 100%" name="confirmation"
             type="password"/>
        </div>
            <div class="form-group">
                Name and details:<br>
                <select name="people_id">
<?php
echo '<option value="0" selected>Please choose</option>\n';
$sql = "SELECT id, surname, first_name, given_name FROM `people` ";
$sql .= "where status in ('Staff', 'Contractor', 'Associate') ";
$sql .= "order by surname, first_name";
$rows = query($sql);
foreach ($rows as $row) {
    $name = $row["surname"];
    if (!empty($row["first_name"])) {
        $name .= ", " . $row["first_name"];
    }
    if (!empty($row["given_name"])) {
        $name .= " (" . $row["given_name"] . ")";
    }
    echo '<option value="' . $row["id"] . '"' . ">" . $name . "</option>\n";
}
?>
                </select>
            </div>
            <br>
        <div class="form-group">
            <button type="submit" class="w3-button w3-green">Register</button> or 
            choose another menu option
        </div>
    </fieldset>
</form>
<h2>Registering a User</h2>
<p>All Residents are registered, by default, so they need not be registered here.  
    Only register staff, contractors, and associates.</p>
<p>Details will be taken from the People records, so please ensure that the record 
    has been updated and checked.</p>
<p>If any information found on the site is thought to be inaccurate or 
    inappropriate, please send details to 
    <a href="mailto:rob@crothall.co.za?Subject=SPRV%20Website" target="_top">
        the General Manager</a> of Settlers Park Retirement Village.
</p>
</div>
