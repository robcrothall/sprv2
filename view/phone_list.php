<?php
/**
 * Program: phone_list
 * 
 * Display a phone list
 * PHP version 5
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id> 
 * @link     http://www.sprv.co.za
 * @PHP      7.1
 */
require "../conf/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
require "../assets/inc/head.php";
require "../assets/inc/body.php";
require "../view/menu.php";
require "../assets/inc/msg.php";
require "../assets/inc/db_open.php";
if (file_exists("../data/phone_list.csv")) { 
    unlink("../data/phone_list.csv"); 
}
$fp = fopen("../data/phone_list.csv", 'w');
echo '<h1>Settlers Park phone list</h1>';
//echo '<ul>';
?>
<p>Please download the CSV file and follow the following instructions to
create the full document in Excel.  You may want to print this page.</p>
<ol>
    <li>Click the "Download" button and save the "phone_list.csv" file in your 
        "Downloads" folder.
        <a href="../data/phone_list.csv" class="w3-button w3-green">Download</a>
    </li>
    <li>Open Excel and create a new spreadsheet.  Save it in a folder of your 
        choice as "Phone List - Residents - yyyymmdd" where "yyyymmdd" is 
        the current date</li>
    <li>Select "Data -> From Text/CSV" and the "Import Data" window will open.</li>
    <li>Navigate to your "Downloads" folder and select "phone_list.csv". 
        Click "Import".</li>
    <li>Excel will prepare to import, but will probably select a "Comma" as a 
        delimeter.  Change that to "Tab".</li>
    <li>At the bottom of the window, select "Transform Data".  In the command line,
        change "Int64.Type" to "type text" in both places. 
        Select "Close & Load".</li>
    <li>On row 1, change the column headings to "Name", "Cottage", 
        "Ext. No.", "Cell No." and "Email Address".</li>
    <li>Select columns B, C, and D, "Format Cells", "Alignment", "Horizontal" -> 
        "Center". Click "OK".</li>
    <li>Select "Page Layout" and the bottom right-hand corner of "Page Setup".  
        The Page Setup dialog box will appear.</li>
    <li>Select "Page" -> "Portrait".  Then "Header/Footer" -> "Custom Header".
        <ul>
        <li>In "Left Section" enter "Settlers Park Retirement Village"</li>
        <li>In "Center Section" enter "Resident Phone List"</li>
        <li>In "Right Section" enter "Effective Date:" and then select the 
        "Insert date" icon.</li>
        </ul>
    </li>
    <li>Select "Sheet" and in "Rows to repeat at top:", enter "$1:$1".</li>
    <li>Select "OK". Select "OK".</li>
    <li>Save yor Excel file and print one copy as a test - make sure that 
        all columns are printed on the same page.  Check that there 
        are no data issues, like missing extension numbers, duplicate people, 
        format of the mobile number, etc.</li>
</ol>
<p>If the printout is correct, print to a PDF and then print as many paper copies 
    as you need.  You can email the PDF to the residents and encourage them 
    to print their own list.</p>
<h2>Error and warning list</h2> 
<?php
$errcount = 0;
$sql = "select first_name, other_name, given_name, surname,";
$sql .= " home_phone, mobile_phone, mp_disclose,";
$sql .= " home_email, he_disclose, cottage, cottage_id";
$sql .= " from people";
$sql .= " where status = 'RESIDENT'";
$sql .= " order by surname, cottage, first_name";
$rows = query($sql);
foreach ($rows as $row) {
    $first_name = ucwords(strtolower($row["first_name"]));
    $other_name = ucwords(strtolower($row["other_name"]));
    $given_name = ucwords(strtolower($row["given_name"]));
    $surname = ucwords(strtolower($row["surname"]));
    $err_name = $surname . ", " . $first_name . " - Cottage: " . $row["cottage"];
    if ($first_name == $given_name) {
        $given_name = '';
        echo "<br>Given name is identical to First name - " . $err_name;
    }
    $home_phone = '"' . substr($row["home_phone"], -3) . '"';
    if (strlen($home_phone) < 4) {
        echo "<br>Missing Extension number - " . $err_name;
    }
    $mobile_phone = '';
    $m_phone = $row["mobile_phone"];
    if (strlen($m_phone) < 12) {
        $mobile_phone = substr($m_phone, 0, 3) . " ";
        $mobile_phone .= substr($m_phone, 3, 3) . " ";
        $mobile_phone .= substr($m_phone, 6);
    } else {
        $mobile_phone = $m_phone;
    }
    $mobile_phone = '"' . $mobile_phone . '"';
    $mp_disclose = $row["mp_disclose"];
    if (strlen($mobile_phone) > 4) {
        if ($mp_disclose == "?") {
            echo "<br>Disclosure of mobile phone not set - " . $mobile_phone . " - " . $err_name;
        }
    }
    $home_email = $row["home_email"];
    $he_disclose = $row["he_disclose"];
    if (strlen($home_email) > 2) {
        if ($he_disclose == "?") {
            echo "<br>Disclosure of home email not set - " . $home_email . " - " . $err_name;
        }
    }
    $cottage = $row["cottage"];
    if ($cottage == '') {
        echo "<br>Cottage text is missing - " . $err_name;
    }
    $cottage_id = $row["cottage_id"];
    $trans = $surname . ", " . $first_name;
    if (strlen($given_name) > 0) {
        $trans .= " (" . $given_name . ")";
    }
    $trans .= "\t";
    $trans .= $cottage . "\t";
    $trans .= $home_phone . "\t";
    if ($mp_disclose == "Y") {
        $trans .= $mobile_phone;
    }
    $trans .= "\t";
    if ($he_disclose == "Y") {
        $trans .= $home_email;
    }
    $trans .= "\n";
    fwrite($fp, $trans);
}
//echo '</ul>';
fclose($fp);
require "../assets/inc/msg.php";
require "../assets/inc/footer.php";
?>
