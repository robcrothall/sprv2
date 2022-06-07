<h2>Record a new Person</h2>
<?php
/**
 * People_create_form
 * 
 * This displays the fields required for creating a person record
 * PHP Version 7.1
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git-id>
 * @link     http://www.sprv.co.za
 */
$surname = "";
$first_name = "";
$other_name = "";
$given_name = "";
$title = "";
$acc_pref = 0;
$account_no = "";
$status = "Associate";
$status_date = date("Y-m-d");
$company_id = 0;
$id_no = "";
$birth_date = date("Y-m-d", strtotime("1900-01-01"));
$bd_disclose = "?";
$home_phone = "";
$hp_disclose = "?";
$work_phone = "";
$wp_disclose = "?";
$mobile_phone = "";
$mp_disclose = "?";
$whatsapp = "?";
$home_email = "";
$he_disclose = "?";
$an_disclose = "?";
$photo_disclose = "?";
$work_email = "";
$sex = "U";
$cottage_id = 0;
$race = "U";
$checked = "N";
$notes = "";
?>
<form action="../page/people_create.php" method="post">
    <input type='submit' value='Save' class='w3-button w3-green' />
    <a href='../page/people.php' class='w3-button w3-green'>Back to People</a>
    <table class='w3-table-all' width="100%">
        <tr>
            <td align="right" valign="top">Surname</td>
            <td><input type='text' name='surname' class='form-control' 
            maxlength="50" size="50" required></td>
        </tr>
        <tr>
            <td align="right" valign="top">First name</td>
            <td><input type='text' name='first_name' class='form-control' 
            maxlength="50" size="50" required></td>
        </tr> 
        <tr>
            <td align="right" valign="top">Other names</td>
            <td><input type='text' name='other_name' class='form-control' 
            maxlength="50" size="50"></td>
        </tr> 
        <tr>
            <td align="right" valign="top">Given name</td>
            <td><input type='text' name='given_name' class='form-control' 
            maxlength="50" size="50"></td>
        </tr> 
        <tr>
            <td align="right" valign="top">Title</td>
            <td><input type='text' name='title' class='form-control'></td>
        </tr> 
        <tr>
            <td>Account No (if it already exists)</td>
            <td><input type='text' name='account_no' class='form-control'></td>
        </tr> 
        <tr>
            <td>Old Account No</td>
            <td><input type='text' name='old_account_no' class='form-control'></td>
        </tr> 
        <tr>
            <td>Status</td>
            <td>
                <select name="status" required>
<?php
$sql = 'select parm_value from parms_char ';
$sql .= 'where parm_name = "park_stat" ';
$sql .= 'order by parm_value';
$stat = query($sql);
foreach ($stat as $mystat) {
    if ($mystat["parm_value"] == "Associate") {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=" . $mystat["parm_value"] . " ";
    echo $selected . ">" . $mystat["parm_value"] . "</option>";
}
?>
                </select>
            </td>
        </tr> 
        <tr>
            <td>Status date</td>
            <td><input type='date' name='status_date' class='form-control' 
            value='<?php echo $status_date; ?>' /></td>
        </tr> 
        <tr>
            <td align="right" valign="top">Company</td>
            <td>
                <select name="company_id">
<?php
$rows = query("SELECT * FROM `company` order by co_name");
foreach ($rows as $row) {
    if ($row['id'] == 0) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=" . $row['id'] . $selected . ">";
    echo $row['co_name'] . "</option>";
}
?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">ID number</td>
            <td><input type='text' name='id_no' class='form-control' 
            maxlength="20" size="20"></td>
        </tr> 
        <tr>
            <td align="right" valign="top">Driver Licence Number</td>
            <td><input type='text' name='driver_lic' class='form-control' 
            maxlength="20" size="20"></td>
        </tr> 
        <tr>
            <td align="right" valign="top">Birth date</td>
            <td><input type='date' name='birth_date' class='form-control'></td>
        </tr> 
        <tr>
            <td>Birth date disclosure</td>
            <td>
                <select name="bd_disclose">
<?php
$bd_disclose_status = ["Y","N","?"];
foreach ($bd_disclose_status as $bd_status) {
    if ($bd_status == '?') {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=$bd_status $selected>$bd_status</option>";
}
?>
                </select>
            </td>
        </tr> 
        <tr>
            <td align="right" valign="top">Home phone</td>
            <td><input type='tel' name='home_phone' class='form-control'></td>
        </tr> 
        <tr>
            <td>Home phone disclosure</td>
            <td>
                <select name="hp_disclose">
<?php
$hp_disclose_status = ["Y","N","?"];
foreach ($hp_disclose_status as $hp_status) {
    if ($hp_disclose == $hp_status) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=$hp_status $selected>$hp_status</option>";
}
?>
                  </select>
            </td>
        </tr> 
        <tr>
            <td align="right" valign="top">Work phone</td>
            <td><input type='tel' name='work_phone' class='form-control'></td>
        </tr> 
        <tr>
            <td>Work phone disclosure</td>
            <td>
                  <select name="wp_disclose">
<?php
$wp_disclose_status = ["Y","N","?"];
foreach ($wp_disclose_status as $wp_status) {
    if ($wp_disclose == $wp_status) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=$wp_status $selected>$wp_status</option>";
}
?>
                  </select>
            </td>
        </tr> 
        <tr>
            <td align="right" valign="top">Mobile phone</td>
            <td><input type='tel' name='mobile_phone' class='form-control'></td>
        </tr> 
        <tr>
            <td>Mobile phone disclosure</td>
            <td>
                  <select name="mp_disclose">
<?php
$mp_disclose_status = ["Y","N","?"];
foreach ($mp_disclose_status as $mp_status) {
    if ($mp_disclose == $mp_status) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=$mp_status $selected>$mp_status</option>";
}
?>
                  </select>
            </td>
        </tr> 
        <tr>
            <td>WhatsApp</td>
            <td>
                  <select name="whatsapp">
<?php
$whatsapp_stat = ["?","Y","N"];
foreach ($whatsapp_stat as $wstat) {
    if ($whatsapp == $wstat) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=$wstat $selected>$wstat</option>";
}
?>
                  </select>
            </td>
        </tr> 
        <tr>
            <td align="right" valign="top">Home email</td>
            <td><input type='email' name='home_email' class='form-control' 
            maxlength="50" size="50"></td>
        </tr> 
        <tr>
            <td>Home email disclosure</td>
            <td>
                  <select name="he_disclose">
<?php
$he_disclose_status = ["Y","N","?"];
foreach ($he_disclose_status as $he_status) {
    if ($he_disclose == $he_status) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=$he_status $selected>$he_status</option>";
}
?>
                  </select>
            </td>
        </tr> 
        <tr>
            <td align="right" valign="top">Work email</td>
            <td><input type='email' name='work_email' class='form-control' 
            maxlength="50" size="50"></td>
        </tr> 
        <tr>
            <td>Sex</td>
            <td>
                  <select name="sex">
<?php
$sex_stat = ["?","F","M"];
foreach ($sex_stat as $sstat) {
    if ($sex == $sstat) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=$sstat $selected>$sstat</option>";
}
?>
                  </select>
            </td>
        </tr> 
        <tr>
            <td>Anniversary disclosure</td>
            <td>
                  <select name="an_disclose">
<?php
$an_disclose_status = ["Y","N","?"];
foreach ($an_disclose_status as $an_status) {
    if ($an_disclose == $an_status) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=$an_status $selected>$an_status</option>";
}
?>
                  </select>
            </td>
        </tr> 
        <tr>
            <td>Photo disclosure</td>
            <td>
                  <select name="photo_disclose">
<?php
$photo_disclose_status = ["Y","N","?"];
foreach ($photo_disclose_status as $photo_status) {
    if ($photo_disclose == $photo_status) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=$photo_status $selected>$photo_status</option>";
}
?>
                  </select>
            </td>
        </tr> 
<!--        <tr>
            <td align="right" valign="top">Passport number</td>
            <td><input type='text' name='passport_no' class='form-control'></td>
        </tr> 
        <tr>
            <td align="right" valign="top">Passport expiry</td>
            <td><input type='date' name='passport_expiry' class='form-control'></td>
        </tr> 
        <tr>
            <td align="right" valign="top">Driver's license</td>
            <td><input type='text' name='driver_lic' class='form-control' 
            maxlength="20" size="20"></td>
        </tr> 
        <tr>
            <td align="right" valign="top">Driver's license expiry</td>
            <td><input type='date' name='driver_expiry' class='form-control'></td>
        </tr> -->
        <tr>
            <td align="right" valign="top">Cottage - text</td>
            <td><input type='text' name='cottage' class='form-control'></td>
        </tr> 
        <tr>
            <td>Cottage</td>
            <td>
                  <select name="cottage_id">
<?php
$sql = "SELECT * FROM asset where asset_type_char = 'Cottage' ";
$sql .= "or asset_type_char = 'Care Centre Room' order by asset_seq, asset_name";
$rows = query($sql);
foreach ($rows as $row) {
    echo "<option value=" . $row['id'] . ">" . $row['asset_name'] . "</option>";
}
?>
                  </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Occupation</td>
            <td>
                  <select name="occupation_id">
<?php
$rows = query("SELECT * FROM `occupation` order by occupation");
foreach ($rows as $row) {
    if ($_SESSION["occupation_id_select"] == $row['id']) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=" . $row['id'] . $selected . ">";
    echo $row['occupation'] . "</option>";
}
?>
                  </select>
            </td>
        </tr>
       <tr>
            <td>Race</td>
            <td>
                  <select name="race">
<?php
$race_status = ["White","Black","Indian","Asian","Coloured","Not specified"];
foreach ($race_status as $status) {
    if ($sex == $status) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=$status $selected>$status</option>";
}
?>
                  </select>
            </td>
        </tr> 
        <tr>
            <td align="right" valign="top" width="20%">Notes on this person</td>
            <td><textarea name='notes' class='form-control' 
            rows="4" cols="50"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='w3-button w3-green' />
                <a href='../page/people.php' 
                class='w3-button w3-green'>Back to People</a>
            </td>
        </tr>
    </table>
</form>
