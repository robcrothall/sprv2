<?php
/**
 * Program: lib_people_edit
 * 
 * Edit a membership.
 * php version 5
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
require "../assets/inc/head.php";
require "../assets/inc/body.php";
require "../inc/menu.php";
require "../assets/inc/msg.php";
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../assets/inc/db_open.php";
    $id = test_input($_GET["id"]);
    if (trim($id) == '') {
        die("No ID specified - please inform SysAdmin.");
    }
    $sql = "select * ";
    $sql .= "from people where id = " . $id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from people - please advise SysAdmin.");
    }
    $surname         = $row["surname"];
    $first_name      = $row["first_name"];
    $other_name      = $row["other_name"];
    $given_name      = $row["given_name"];
    if ($surname    == strtoupper($surname) | $surname == strtolower($surname)) {
        $surname    = ucwords(strtolower($surname));
    }
    if ($first_name == strtoupper($first_name)
        or $first_name == strtolower($first_name)
    ) {
        $first_name = ucwords(strtolower($first_name));
    }
    if ($other_name == strtoupper($other_name) 
        or $other_name == strtolower($other_name)
    ) {
        $other_name = ucwords(strtolower($other_name));
    }
    if ($given_name == strtoupper($given_name) 
        or $given_name == strtolower($given_name)
    ) {
        $given_name = ucwords(strtolower($given_name));
    }
    $title           = ucwords(strtolower($row["title"]));
    $full_name = $surname . ", " . $first_name;
    if (!empty($given_name)) {
        $full_name .= " (" . $given_name . ")";
    }
    $account_no      = strtoupper($row["account_no"]);
    $status          = $row["status"];
    $_SESSION["status"] = $status;
    $people_id       = $row["id"];
    $id_no           = $row["id_no"];
    $driver_lic      = $row["driver_lic"];
    $home_phone      = $row["home_phone"];
    $work_phone      = $row["work_phone"];
    $mobile_phone    = $row["mobile_phone"]; 
    $whatsapp        = $row["whatsapp"];
    $work_email      = $row["work_email"];
    $home_email      = $row["home_email"];
    $passport_no     = $row["passport_no"];
    ?>
<h1>Edit Member Details</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<input type="submit" name="submit" value="Update" 
    class='w3-button w3-green'/>&nbsp;&nbsp;
<a class="w3-button w3-green" 
    href="../page/lib_memberships_list.php">Return to Memberships List</a>
<input type="hidden" id="rec_id" name="rec_id" 
    value="<?php echo $people_id; ?>" />
<table class='w3-table-all'>
<tr>
    <td>Surname</td> 
    <td><input type='text' name='surname' class='form-control' 
        required value="<?php echo $surname; ?>" /></td>
</tr>
<tr>
    <td>First name</td>
    <td><input type='text' name="first_name" class='form-control' 
                required value="<?php echo $first_name; ?>" /></td>
</tr> 
<tr>
    <td>Other names</td>
    <td><input type='text' name='other_name' class='form-control' 
        value="<?php echo $other_name; ?>"" /></td>
</tr> 
<tr>
    <td>Given name</td>
    <td><input type='text' name='given_name' class='form-control' 
        value="<?php echo $given_name; ?>" /></td>
</tr> 
<tr>
    <td>Title</td>
    <td><input type='text' name='title' class='form-control' 
        value="<?php echo $title; ?>" /></td>
</tr> 
<tr>
    <td>Account No</td>
    <td><?php echo $account_no; ?></td>
</tr> 
<tr>
    <td>ID number</td>
    <td><input type='text' name='id_no' class='form-control' 
         value='<?php echo $id_no; ?>' /></td>
</tr> 
<tr>
    <td>Driver's Licence number</td>
    <td><input type='text' name='driver_lic' class='form-control' 
        value='<?php echo $driver_lic; ?>' /></td>
</tr> 
<tr>
    <td>Home phone</td>
    <td><input type='text' name='home_phone' class='form-control' 
        value='<?php echo $home_phone; ?>' /></td>
</tr> 
<tr>
    <td>Work phone</td>
    <td><input type='text' name='work_phone' class='form-control' 
        value='<?php echo $work_phone; ?>' /></td>
</tr> 
<tr>
    <td>Mobile phone</td>
    <td><input type='text' name='mobile_phone' class='form-control' 
        value='<?php echo $mobile_phone; ?>' /></td>
</tr> 
<tr>
    <td>WhatsApp</td>
    <td>
        <select name="whatsapp">
    <?php
    $whatsapp_status = ["Y","N","?"];
    foreach ($whatsapp_status as $status) {
        if ($whatsapp == $status) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        echo "<option value=$status $selected>$status</option>\n";
    }
    ?>
        </select>
    </td>
</tr> 
<tr>
    <td>Home email</td>
    <td><input type='text' name='home_email' class='form-control' 
        value='<?php echo $home_email; ?>' /></td>
</tr> 
<tr>
    <td>Work email</td>
    <td><input type='text' name='work_email' class='form-control' 
        value='<?php echo $work_email; ?>' /></td>
</tr> 
<tr>
    <td colspan=2><input type="submit" name="submit" value="Update" 
        class='w3-button w3-green'/>&nbsp;&nbsp;
        <a class="w3-button w3-green" 
            href="../page/lib_memberships_list.php">Return to Memberships List</a>
    </td>
</tr>
</table>
</form>
    <?php
} else {
    include "../assets/inc/msg.php";
    echo '<h1>Edit Member Details</h1>';
    $errorList = array();
    $message = '';
    $rec_id = test_input($_POST["rec_id"]);
    $user_id = $_SESSION["id"];
    //$rec_id = $_SESSION["rec_id"];
    //var_dump($rec_id);
    $_SESSION["people_id"] = $rec_id;
    $_SESSION["selected_people_id"] = $rec_id;
    $rows = query("select * from people where id=?", $rec_id);
    if (count($rows) <> 1) {
        $message = "Internal error - please call support.  Rec_id = " . $rec_id;
        die($message);
    }
    if (empty($_POST["surname"])) {
        $surname = "";
    } else {
        $surname = test_input($_POST['surname']);
    }
    if ($surname == strtoupper($surname) or $surname == strtolower($surname)) {
        $surname = ucwords(strtolower($surname));
    }
    if (empty($_POST["first_name"])) {
        $first_name = "";
    } else {
        $first_name = test_input($_POST['first_name']);
    }
    if ($first_name == strtoupper($first_name) 
        or $first_name == strtolower($first_name)
    ) {
        $first_name = ucwords(strtolower($first_name));
    }
    if (empty($_POST["other_name"])) {
        $other_name = "";
    } else {
        $other_name = test_input($_POST['other_name']);
    }
    if ($other_name == strtoupper($other_name) 
        || $other_name == strtolower($other_name)
    ) {
        $other_name = ucwords(strtolower($other_name));
    }
    if (empty($_POST["given_name"])) {
        $given_name = "";
    } else {
        $given_name = test_input($_POST['given_name']);
    }
    if ($given_name == strtoupper($given_name) 
        || $given_name == strtolower($given_name)
    ) {
        $given_name = ucwords(strtolower($given_name));
    }
    if (empty($_POST["title"])) {
        $title = "";
    } else {
        $title = test_input($_POST['title']);
    }
    if ($title == strtoupper($title) | $title == strtolower($title)) {
        $title = ucwords(strtolower($title));
    }
    if (empty($_POST['id_no'])) {
        $id_no = "";
    } else {
        $id_no = test_input($_POST['id_no']);
    }
    if (empty($_POST["driver_lic"])) {
        $driver_lic = "";
    } else {
        $driver_lic = test_input($_POST["driver_lic"]);
    }
    $driver_lic = strtoupper($driver_lic);
    if (empty($_POST["home_phone"])) {
        $home_phone = "";
    } else {
        $home_phone = test_input($_POST['home_phone']);
    }
    if (empty($_POST["work_phone"])) {
        $work_phone = "";
    } else {
        $work_phone = test_input($_POST['work_phone']);
    }
    if (empty($_POST["mobile_phone"])) {
        $mobile_phone = "";
    } else {
        $mobile_phone = test_input($_POST['mobile_phone']);
    }
    if (empty($_POST["whatsapp"])) {
        $whatsapp = "Y";
    } else {
        $whatsapp = test_input($_POST['whatsapp']);
    }
    if (empty($_POST["home_email"])) {
        $home_email = "";
    } else {
        $home_email     = test_input($_POST['home_email']);
    }
    $home_email = strtolower($home_email);
    if (empty($_POST["work_email"])) {
        $work_email = "";
    } else {
        $work_email = test_input($_POST['work_email']);
    }
    $work_email = strtolower($work_email);
    $user_id = $_SESSION['id'];
    // Do some validation
    $error = false;
    $errMsg = "";
    $Msg = "Update was successful. ";
    if (empty($surname)) {
        $errMsg .= "The surname should not be empty. "; $error = true;
    }
    if (empty($surname)) {
        $errMsg .= "There must be a surname. "; 
        $error = true;
    }
    if (empty($first_name)) {
        $errMsg .= "There must be a first name. "; 
        $error = true;
    }
    if (empty($mobile_phone) && empty($home_phone) && empty($work_phone)) {
        $Msg .= "Please provide a phone number. "; 
        //$error = true;
    }
    if (empty($home_email) && empty($work_email)) {
        $Msg .= "Please provide an email address. "; 
        //$error = true;
    }
    //if($error) {$errMsg .= "Error is True.  ";}
    //else {$errMsg .= "Error is False.  ";}
    if ($error == true) {
        apologize($errMsg);
    }
    $rows = query(
        "update people set surname=?, first_name=?, " . 
        "other_name=?, given_name=?, title=?, " .
        "id_no=?, driver_lic=?, " .
        "home_phone=?, " . 
        "work_phone=?, mobile_phone=?, " .
        "whatsapp=?, home_email=?, " . 
        "work_email=?, " .
        "user_id=? where id=?", 
        $surname, $first_name, $other_name, $given_name, $title,  
        $id_no, $driver_lic, 
        $home_phone,  
        $work_phone, $mobile_phone, 
        $whatsapp, $home_email,  
        $work_email,  
        $user_id, $rec_id
    );
    If ($rows === false) {
        print_r($sql);
        print_r("\n - Rec-id:");
        print_r($rec_id);
        print_r("\n - Surname:");
        print_r($surname);
        print_r(" - First name:");
        print_r($first_name);
        print_r(" - Other name:");
        print_r($other_name);
        print_r(" - Birth date:");
        print_r($birth_date);
        print_r(" - Status:");
        print_r($status);
        print_r(" - Status Date:");
        print_r($status_date);
        print_r(" - Company ID:");
        print_r($company_id);
        print_r(" - Occupation ID:");
        print_r($occupation_id);
        print_r(" - Notes:");
        print_r($notes);
        print_r(" - Length of notes:");
        print_r(strlen($notes));
        print_r(" - User ID:");
        print_r($user_id);
        apologize("Update failed. Please print this screen and send to SysAdmin.  ");
    } else {
        $sql = "insert into people_log select * from people where id=?";
        $rows = query($sql, $rec_id);
        $message .= $errMsg . $Msg;
        //if ($rows != false) {
            //$Msg .= "Backup to log failed - Please tell SysAdmin!  ";
        //}
    }
    echo '<a href="../page/lib_memberships_list.php" class="w3-button w3-green">';
    echo 'Back to Membership List</a>';
    include "../assets/inc/msg.php";
    include "../assets/inc/footer.php";
}
?>
