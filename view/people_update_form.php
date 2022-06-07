<?php
/**    
 * Short description for file
 *
 * Long description for file (if any)...
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Original Author <author@example.com>
 * @author     Another Author <another@example.com>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      File available since Release 1.2.0
 * @deprecated File deprecated in Release 2.0.0
 */

$_SESSION["module"] = $_SERVER["PHP_SELF"];
$people_id = $_SESSION["rec_id"];
$_SESSION["people_id"] = $people_id;
$data = query("select * from people where id = ?", $people_id); 
$_SESSION["search_name_start"] = $data[0]["surname"];
$_SESSION["selected_cottage"]  = $data[0]["cottage"];
$surname         = $data[0]["surname"];
$first_name      = $data[0]["first_name"];
$other_name      = $data[0]["other_name"];
$given_name      = $data[0]["given_name"];
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
$title           = ucwords(strtolower($data[0]["title"]));
// $marital_status  = strtoupper($data[0]["marital_status"]);
$account_no      = strtoupper($data[0]["account_no"]);
$acc_pref        = strtoupper($data[0]["acc_pref"]);
$old_account_no  = strtoupper($data[0]["old_account_no"]);
$status          = $data[0]["status"];
$_SESSION["status"] = $status;
$status_date     = $data[0]["status_date"];
//$_SESSION["status_date"] = $status_date;
$company_id      = $data[0]["company_id"];
$id_no           = $data[0]["id_no"];
$driver_lic      = $data[0]["driver_lic"];
$birth_date      = $data[0]["birth_date"];
$bd_disclose     = $data[0]["bd_disclose"];
$home_phone      = $data[0]["home_phone"];
$hp_disclose     = $data[0]["hp_disclose"];
$work_phone      = $data[0]["work_phone"];
$wp_disclose     = $data[0]["wp_disclose"];
$mobile_phone    = $data[0]["mobile_phone"]; 
$mp_disclose     = $data[0]["mp_disclose"];
$whatsapp        = $data[0]["whatsapp"];
$work_email      = $data[0]["work_email"];
$home_email      = $data[0]["home_email"];
$he_disclose     = $data[0]["he_disclose"];
$an_disclose     = $data[0]["an_disclose"];
$photo_disclose  = $data[0]["photo_disclose"];
$sex             = $data[0]["sex"];
$race            = $data[0]["race"];
//$passport_no     = $data[0]["passport_no"];
//$passport_expiry = $data[0]["passport_expiry"];
//$driver_expiry   = $data[0]["driver_expiry"];
$occupation_id   = $data[0]["occupation_id"];
//$rs_rep_id       = $data[0]["rs_rep"];
$cottage         = $data[0]["cottage"];
$cottage_id      = $data[0]["cottage_id"];
$notes           = $data[0]["notes"];
$checked         = $data[0]["checked"];
$user_id         = $data[0]["user_id"];
$changed         = $data[0]["changed"];
$data = query("select username from users where id = ?", $user_id);
$username        = $data[0]["username"];
?>
<br>
<h2>Update Person details</h2>

<form action="../page/people_update.php" method="post">
<input type='submit' value='Save' class='w3-button w3-green' />
<a href='people.php' class='w3-button w3-green'>Back to people</a>
    <table class='w3-table-all'>
        <tr>
            <td>Surname</td> 
            <input type="hidden" id="rec_id" name="rec_id" 
                value="<?php echo $people_id; ?>" /></td>
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
        <td>Billing preferred</td>
            <td><input type="number" name="acc_pref" class="form-control" size="3" 
                step="1" value="<?php echo "$acc_pref"; ?>"></td>
        </tr> 
        <tr>
        <td>Old Account No</td>
            <td><input type='text' name='old_account_no' class='form-control' 
                value='<?php echo $old_account_no; ?>' /></td>
        </tr> 
         <tr>
        <td>Status</td>
            <td>
  <select name="status">
  <?php
    $sql =  'select parm_value from parms_char where parm_name = "park_stat" '; 
    $sql .= 'order by parm_value';
    $stat = query($sql);
    foreach ($stat as $mystat) {
        if ($status == $mystat["parm_value"]) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        echo "<option value=" . $mystat["parm_value"] . " " . $selected . ">"; 
        echo $mystat["parm_value"] . "</option>\n";
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
<td>Company</td>
<td>
  <select name="company_id">
  <?php
    $rows = query("SELECT * FROM `company` order by co_name");
    foreach ($rows as $row) {
        if ($company_id == $row['id']) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        echo '<option value="' . $row['id'] . '"' . $selected . '>' . $row['co_name']; 
        echo "</option>\n";
    }
    ?>
  </select>
</td>
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
        <td>Birth date</td>
         <td><input type='date' name='birth_date' class='form-control' 
         value='<?php echo $birth_date; ?>' /></td>
        </tr> 
        <tr>
        <td>Birth date disclosure</td>
            <td>
  <select name="bd_disclose">
  <?php
    $bd_disclose_status = ["Y","N","?"];
    foreach ($bd_disclose_status as $bd_status) {
        if ($bd_disclose == $bd_status) {
              $selected = " selected";
        } else {
            $selected = "";
        }
          echo "<option value=$bd_status $selected>$bd_status</option>\n";
    }
    ?>
  </select>
            </td>
        </tr> 
        <tr>
        <td>Home phone</td>
            <td><input type='text' name='home_phone' class='form-control' 
            value='<?php echo $home_phone; ?>' /></td>
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
        echo "<option value=$hp_status $selected>$hp_status</option>\n";
    }
    ?>
  </select>
            </td>
        </tr> 
        <tr>
        <td>Work phone</td>
            <td><input type='text' name='work_phone' class='form-control' 
            value='<?php echo $work_phone; ?>' /></td>
        </tr> 
        <tr>
        <td>Work Phone disclosure</td>
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
        echo "<option value=$wp_status $selected>$wp_status</option>\n";
    }
    ?>
  </select>
            </td>
        </tr> 
        <tr>
        <td>Mobile phone</td>
         <td><input type='text' name='mobile_phone' class='form-control' 
         value='<?php echo $mobile_phone; ?>' /></td>
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
        echo "<option value=$mp_status $selected>$mp_status</option>\n";
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
        echo "<option value=$he_status $selected>$he_status</option>\n";
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
        echo "<option value=$an_status $selected>$an_status</option>\n";
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
        echo "<option value=$photo_status $selected>$photo_status</option>\n";
    }
    ?>
  </select>
            </td>
        </tr> 
        <tr>
        <td>Work email</td>
            <td><input type='text' name='work_email' class='form-control' 
            value='<?php echo $work_email; ?>' /></td>
        </tr> 
        <tr>
        <td>Sex</td>
            <td>
  <select name="sex">
  <?php
    $sex_status = ["U","F","M"];
    foreach ($sex_status as $status) {
        if ($sex == $status) {
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
        <td>Cottage - text</td>
         <td><input type='text' name='cottage' class='form-control' 
         value='<?php echo $cottage; ?>' /></td>
        </tr> 
     <tr>
<td>Cottage</td>
<td>
  <select name="cottage_id">
  <?php
    $sql = "SELECT * FROM asset where asset_type_char = 'Cottage' or "; 
    $sql .= "asset_type_char = 'Care Centre Room' order by asset_seq, asset_name";
    $rows = query($sql);
    foreach ($rows as $row) {
        if ($cottage_id == $row['id']) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        echo "<option value=" . $row['id'] . $selected . ">" . $row['asset_name'];
        echo "</option>\n";
    }
    ?>
  </select>
</td>
    </tr>
    <tr>
<td>Occupation</td>
<td>
  <select name="occupation_id">
    <?php
    $rows = query("SELECT * FROM `occupation` order by occupation");
    foreach ($rows as $row) {
        if ($occupation_id == $row['id']) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        echo "<option value=" . $row['id'] . $selected . ">" . $row['occupation'];
        echo "</option>\n";
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
    $race_status = ["Not specified","White","Black","Indian","Asian","Coloured"];
    foreach ($race_status as $status) {
        if ($race == $status) {
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
        <td>Checked</td>
            <td>
  <select name="checked">
  <?php
    $checked_status = ["N","Y","Query"];
    foreach ($checked_status as $status) {
        if ($checked == $status) {
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
            <td>Notes on this person</td>
            <td><textarea name='notes' class='form-control' rows="4" 
                cols="50"><?php echo $notes; ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='w3-button w3-green' />
                <a href='people.php' class='w3-button w3-green'>Back to people</a>
            </td>
        </tr>
    </table>
</form>
