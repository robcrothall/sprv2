<?php
/**
 * Program: task_read_form
 * PHP version 5.0
 * Display the detail about a task.
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 * @PHP      7.1
 */
require "../inc/config.php";
$_SESSION["module"] = $_SERVER["PHP_SELF"];
require "../inc/head.php";
require "../inc/body.php";
require "../inc/menu.php";
require "../inc/msg.php";
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../inc/db_open.php";
    ?>
<div class="w3-container">
<form class="form-control full-width" 
  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <fieldset>
    <div class="form-group">
      Username (>5 chars):<br>
      <input autofocus class="form-control full-width" 
        style="width: 100%" name="username" type="text" required/>
    </div>
    <div class="form-group">
      Password (>7 chars):<br>
      <input class="form-control full-width" 
        style="width: 100%" name="password" type="password"/ required>
    </div>
    <div class="form-group">
      Re-enter password:<br>
      <input class="form-control" style="width: 100%" 
        name="confirmation" type="password"/ required>
    </div>
    <div class="form-group">
      Name and details:<br>
      <select name="people_id">
    <?php
    echo '<option value="0" selected>Please choose</option>' . "\n";
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
    <div class="form-group">
      Departments:<br>
      <select name="dept_id[]" multiple>
    <?php
    $sql = "select id, dept_name from dept order by dept_name";
    $rows = query($sql);
    //echo '<option value="0" selected>Please choose</option>' . "\n";
    foreach ($rows as $row) {
        echo '<option value="' . $row["id"] . '">' . $row["dept_name"] . '</option>';
    }
    ?>
      </select>
    </div>
    <div class="form-group">
      Roles:<br>
    <?php
    $sql = "Select id, role_name, role_days from roles order by role_name";
    $roles = query($sql);
    foreach ($roles as $r) {
        echo '<input type="checkbox" id="' . $r["id"];
        echo '" name="' . $r["id"] . '" value="' . $r["id"] . '"';
        echo '>&emsp;<label for="' . $r["id"] . '">';
        echo $r["role_name"] . '</label><br>';
    }
    ?>
    </div>
          <br>
        <div class="form-group">
            <button type="submit" class="w3-button w3-green">Register</button>
            or choose another menu option
        </div>
  </fieldset>
</form>
<h2>Registering a User</h2>
<p>All Residents are registered, by default, so they need not be registered here.
Only register staff, contractors, and associates.</p>
<p>Details will be taken from the People records, so please ensure that 
the record has been updated and checked.</p>
<p>
If any information found on the site is thought to be inaccurate 
or inappropriate, please send details to 
<a href="mailto:rob@crothall.co.za?Subject=SPRV%20Website" 
target="_top">the General Manager</a> of Settlers Park Retirement Village.
</p>
</div>
    <?php
} else {
    $ERRORS = array();
    $username = '';
    $password = '';
    $confirmation = '';
    $username = (trim($_POST['username']) == '') ?
        $ERRORS[] = "Please enter the username. " :
        htmlspecialchars(trim($_POST["username"]));
    if (strlen($username) < 6) {
        $ERRORS[] = "Username must be more than five characters";
    }
    $password = (trim($_POST['password']) == '') ?
        $ERRORS[] = "Please enter the password. " :
        htmlspecialchars(trim($password));
    if (strlen($password) < 8) {
        $ERRORS[] = "Password must be more than seven characters. ";
    }
}
?>