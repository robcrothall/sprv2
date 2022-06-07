<?php
/**
 * Import ATG files
 *
 * Import ATG files
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   SettlersPark
 * @package    ATGimport
 * @author     Rob Crothall <rob@crothall.co.za>
 * @copyright  2020-2021 Rob Crothall and Associates
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      File available since Release 1.2.0
 * @deprecated File deprecated in Release 2.0.0
 */
$_SESSION["module"] = $_SERVER["PHP_SELF"];
/*  print_r("accperiod = ");
    print_r($_SESSION["accperiod"]);
    print_r("; readingdate = ");
    print_r($_SESSION["readingdate"]);
    var_dump($_SESSION["readingdate"]);
    print_r("; mnth = ");
    print_r($_SESSION["mnth"]);
    print_r("; mnth_c = ");
    print_r($_SESSION["mnth_c"]);
    print_r("; yr = ");
    print_r($_SESSION["yr"]);
    print_r("; yr_c = ");
    print_r($_SESSION["yr_c"]);
    print_r("; Request method = ");
    print_r($_SERVER["REQUEST_METHOD"]);
    print_r("; PHP_SELF = ");
    print_r($_SERVER["PHP_SELF"]);
    print_r("; elec_file = ");
    print_r($_SESSION["elec_file"]);
    print_r("; trans_file = ");
    print_r($_SESSION["trans_file"]);   */
?>
<h2 align="center">At The Gate data input</h2>
<h3 align="left">Options selected are:</h3>
<form action="../page/atg.php" method="post">
   <table cellspacing=0 cellpadding=4>
<?php
   $mnth        = $_SESSION["mnth"];
   $accperiod   = substr("0" . $_SESSION["accperiod"], -2);
   $readingdate = $_SESSION["readingdate"];
   $mnth_c      = $_SESSION["mnth_c"];
   $yr          = $_SESSION["yr"];
   $yr_c        = $_SESSION["yr_c"];
   $atg_file  = "../data/atg_file" . $_SESSION["year_n"] . $_SESSION["mnth_n"];
   $atg_file .= ".csv";
   move_uploaded_file($_FILES["atg_file"]["tmp_name"], $atg_file);
?>
   <tr>
      <td><label for="trans_file">At The Gate transaction file: </label></td>
      <td><?php echo"$atg_file" ?></td>
   </tr>
   </table>
<br>
<hr>
<h3>&quot;At The Gate&quot; data load</h3>
<?php
$line_count = 0;
$handle = fopen($atg_file, "r");
if ($handle) {
    while (!feof($handle) and $line_count < 10) {
        $direction = "none";
        $vehicle_license = "none";
        $drivers_license = "none";
        $id_no = "none";
        $names = ["none"];
        $first_name = "none";
        $surname = "none";
        $co = "none";
        $cat = "none";
        $lic2 = "none";
        $cre8 = "none";
        $cre8_date = "none";
        $cre8_time = "none";
        $scan_time = "none";
        $connected_rec = "none";
        $trip_duration = "none";
        $device = "none";
        $profile = "none";
        $link = "none";
        $incidents = "none";
        $drv_lic_in = "none";
        $co_name_in = "none";
        $passengers_in = "none";
        $passengers_out = "none";
        $name_out = "none";
        $name_in = "none";
        $visiting = "none";
        $id = 0;
        $line_count += 1;
        $line = fgets($handle);
        $line = str_replace('"', "'", $line);
        $field = explode(",", $line);
        if ($field[1] == 'Licence') {
            continue;
        }
        $direction = $field[0];
        if (is_numeric($field[1])) {
            $id_no = $field[1];
        } elseif (strlen($field[1] == 8)) {
            $vehicle_license = $field[1];
        } else {
            $drivers_license = $field[1];
        }
        $names = explode(" ", $field[2]);
        $co = $field[3];
        $cat = $field[4];
        $lic2 = $field[5];
        $cre8 = $field[6];
        $cre8_date = $field[7];
        $cre8_time = $field[8];
        $scan_time = $field[9];
        $connected_rec = $field[10];
        $trip_duration = $field[11];
        $device = $field[12];
        $profile = $field[13];
        $link = $field[14];
        $incidents = $field[15];
        $drv_lic_in = $field[16];
        $co_name_in = $field[17];
        $passengers_in = $field[18];
        $passengers_out = $field[19];
        $name_out = $field[20];
        $name_in = $field[21];
        $visiting = $field[22];
        $sql = "insert into atg_load (
          direction, license, name co, cat, lic2, cre8, cre8_date,
          cre8_time, scan_time, connected, trip_duration, device,
          profile, link, incidents, drv_lic_in, co_name_in, passengers_in,
          passengers_out, name_out, name_in, visiting
          ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = query(
            $sql,
            $direction, $license, $name, $co, $cat, $lic2, $cre8, $cre8_date,
            $cre8_time, $scan_time, $connected, $trip_duration, $device,
            $profile, $link, $incidents, $drv_lic_in, $co_name_in, $passengers_in,
            $passengers_out, $name_out, $name_in, $visiting
        );
    }
} else {
      echo "Cannot open atg file\n";
}
fclose($handle);
fclose($fp);
echo "<br><br>Total in = $totin\n";
echo "<br><br>Total out = $totin\n";
echo "<br><br>Total staff = $totin\n";
echo "<br><br>Total visitors = $totin\n";
echo "<br><br>Total residents = $totin\n";
echo "<br><br>Total contractors = $totin\n";
?>
</table>
</div>
