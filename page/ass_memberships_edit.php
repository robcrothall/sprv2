<?php
/**
 * Program: ass_memberships_edit
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
require "../inc/head.php";
require "../inc/body.php";
require "../inc/menu.php";
require "../inc/msg.php";
require "../inc/db_open.php";
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    $id = test_input($_GET["id"]);
    if (trim($id) == '') {
        die("No ID specified - please inform SysAdmin.");
    }
    $sql = "select * ";
    $sql .= "from memberships where id = " . $id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from memberships - please advise SysAdmin.");
    }
    $id = $row["id"];
    $person_id = $row["person_id"];
    $group_id = $row["group_id"];
    $join_date = $row["join_date"];
    $expiry_date = $row["expiry_date"];
    $status = $row["status"];
    $sql = "select surname, first_name, given_name ";
    $sql .= "from people ";
    $sql .= "where id = " . $person_id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from people - please advise SysAdmin.");
    }
    $full_name = $row["surname"] . ", " . $row["first_name"];
    if (!empty($row["given_name"])) {
        $full_name .= " (" . $row["given_name"] . ")";
    }
    $sql = "select group_name ";
    $sql .= "from groups ";
    $sql .= "where id = " . $group_id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from groups - please advise SysAdmin.");
    }
    $group_name = $row["group_name"];
    $sql = "select * ";
    $sql .= "from memberships where id = " . $id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from memberships - please advise SysAdmin.");
    }
    ?>
<h1>Change Associate Membership expiry</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">&nbsp;&nbsp;
<table cellspacing="5" cellpadding="5">
<tr>
    <td valign="top">Group Name</td>
    <td><?php echo $group_name; ?></td>
</tr>
<tr>
    <td valign="top">Member Name</td>
    <td><?php echo $full_name; ?></td>
</tr>
<!-- <tr>
    <td valign="top">Join date (mm/dd/yyyy)</td>
    <td>
        < ?php //echo $join_date; ? >
    </td>
</tr> -->
<tr>
    <td valign="top">Expiry date (mm/dd/yyyy)</td>
    <td>
        <input type="date" name="expiry_date" id="expiry_date" 
        value=<?php echo $expiry_date; ?>>
    </td>
</tr>
<tr>
    <td colspan=2><input type="submit" name="submit" value="Update" 
        class='w3-button w3-green'/>&nbsp;
        <a class="w3-button w3-green" 
            href="../page/ass_memberships_list.php">Return to Memberships List</a>
        &nbsp;
    </td>

</tr>
</table>
</form>
    <?php
} else {
    include "../inc/msg.php";
    echo '<h1>Change Associate Membership Expiry</h1>';
    $errorList = array();
    $id = test_input($_POST["id"]);
    $expiry_date = test_input($_POST["expiry_date"]);
    $user_id = $_SESSION["id"];
    if (sizeof($errorList) == 0) {
        include "../inc/db_open.php";
        $sql = "update memberships set ";
        $sql .= " expiry_date='" . $expiry_date;
        $sql .= "', user_id='" . $user_id . "'";
        $sql .= " where id = $id";
        $result = mysqli_query($handle, $sql) 
            or die("Error in query: $sql. " . mysqli_error($handle));
        $message = "Update successful.  ";
        $sql = 'select person_id from memberships ';
        $sql .= 'where id = ' . $id;
        $result = mysqli_query($handle, $sql)
            or die("Error in query: $sql. " . mysqli_error($handle));
        $finfo = mysqli_fetch_assoc($result);
        $person_id = $finfo["person_id"];
        // Find potential partners - add those who have linked to the person
        $sql = 'select related_id, relationship ';
        $sql .= 'from people_related ';
        $sql .= 'where people_id = ' . $person_id . ' ';
        $sql .= 'and relationship in ("Spouse", "Partner", "Family", "Friend") ';
        $sql .= 'UNION ';
        $sql .= 'select people_id, relationship ';
        $sql .= 'from people_related ';
        $sql .= 'where related_id = ' . $person_id . ' ';
        $sql .= 'and relationship in ("Spouse", "Partner", "Family", "Friend") ';
        $sql .= 'order by relationship desc; ';
        $first = true;
        $in_table = false;
        //var_dump($sql);
        foreach ($handle->query($sql) as $row) {
            // Is this person an associate who needs to renew?
            //var_dump("Found a related person", $row);
            //echo "<br>";
            $new_person_id = $row["related_id"];
            $relationship_other = $row["relationship"];
            //var_dump("New person id", $new_person_id);
            //echo "<br>";
            $sql = 'select id, expiry_date from memberships ';
            $sql .= 'where group_id = 2 ';
            //$sql .= 'and expiry_date < ' . date("Y-m-d", strtotime("+30 days"));
            $sql .= ' and person_id = ' . $row["related_id"] . " limit 1"; 
            //var_dump("Check date", $sql);
            //echo "<br>";
            $result = $handle->query($sql);
            //var_dump("Result", $result);
            //echo "<br>";
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                //var_dump("Row", $row);
                //echo "<br>";
                if ($first) {
                    echo '<h2>Possible partners - click the name to update</h2>';
                    $first = false;
                    //echo '<table cellspacing="5" cellpadding="5">';
                    $in_table = false;
                }
                $sql2 = "select surname, first_name, given_name ";
                $sql2 .= "from people ";
                $sql2 .= "where id = " . $new_person_id;
                //var_dump("Fetch names", $sql2);
                //echo "<br>";
                $result = mysqli_query($handle, $sql2)
                    or die("Error in query: $sql2 " . mysqli_error($handle));
                $row2 = $result->fetch_array();
                //var_dump("Names", $row2);
                //echo "<br>";
                if (count($row2) > 0) {
                    $full_name = $row2["surname"] . ", " . $row2["first_name"];
                    if (!empty($row2["given_name"])) {
                        $full_name .= " (" . $row2["given_name"] . ")";
                    }
                    //var_dump("Full name", $full_name);
                    //echo "<br>";
                    $sql3 = 'select id from memberships ';
                    $sql3 .= 'where group_id = 2 ';
                    $sql3 .= 'and person_id = ' . $new_person_id;
                    $sql3 .= ' limit 1';
                    //echo "<br>";
                    //var_dump("Get membership number", $sql3);
                    //echo "<br>";
                    $result = mysqli_query($handle, $sql3) 
                        or die("Error in query: $sql3 " . mysqli_error($handle));
                    //var_dump("ID for membership", $result);
                    //echo "<br>";
                    $row3 = $result->fetch_array();
                    if ($result->num_rows > 0) {
                        echo "<br>";
                        echo '<a href="../page/ass_memberships_edit.php?id=';
                        echo $row3["id"] . '">' . $full_name . '</a>';

                    }
                }
            }
        }
    } else {
        echo 'The following errors were encountered:<br>';
        echo '<ul>';
        for ($x=0; $x<sizeof($errorList); $x++) {
            echo "<li>$errorList[$x]";
        }
        echo '</ul>';    
    }
    echo "<br><br>";
    echo '<a href="../page/ass_memberships_list.php" class="w3-button w3-green">';
    echo 'Back to Membership List</a>';
    include "../inc/msg.php";
    include "../inc/footer.php";
}
?>