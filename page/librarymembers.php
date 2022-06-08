<?php
/**
 * Program Name: librarymembers.php
 * 
 * Upload and process Library Members Word document
 * 
 * PHP version 7.1
 * 
 * @category Template
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */
// configuration
require "../inc/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = false;
    $message = "";
    //$_SESSION["doc_date"]    = $_POST["doc_date"];
    //$_SESSION["reading_date"]= strtotime($_POST["readingdate"]);
    //$_SESSION["year_n"]      = date("Y", $_SESSION["reading_date"]);
    //$_SESSION["mnth_n"]      = date("m", $_SESSION["reading_date"]);
    //$_SESSION["day_n"]       = date("d", $_SESSION["reading_date"]);
    //$_SESSION["mnth_c"]      = strtoupper(
    //    date("M", strtotime($_POST["readingdate"]))
    //);
    //$_SESSION["accperiod"] = ((int)$_POST["mnth"] + 8) % 12 + 1;
    $_SESSION["doc_date"] = date("Ymd", strtotime(test_input($_POST["doc_date"])));
    $_SESSION["doc_file"] = "../data/doc_file" . $_SESSION["doc_date"] . ".xml";
    $_SESSION["rep_file"] = "rep_file" . $_SESSION["doc_date"] . ".txt";
    $uploads_dir = "../data";
    $column = 0;
    include "../inc/head.php";
    include "../inc/body.php";
    include "../page/menu.php";
    //var_dump($_SESSION);
    //echo "<hr>";
    //var_dump($_POST);
    echo '<h2 align="center">Library list of Associate Members</h2>';
    echo '<h3 align="left">Options selected are:</h3>';
    echo '<form action="../ctl/librarymembers.php" method="post">';
    echo '<table cellspacing=0 cellpadding=4>';
    $rep_file  = $_SESSION["rep_file"];
    $doc_file = $_SESSION["doc_file"];
    move_uploaded_file($_FILES["doc_file"]["tmp_name"], $doc_file);
    if (file_exists("../data/$rep_file")) {
        unlink("../data/$rep_file");
    }
    if (file_exists("../data/$doc_file")) {
        $fp = fopen("../data/$rep_file", 'w');
        $line = file_get_contents($doc_file);
        $line_count = 0;
        $i = 0;
        $j = 0;
        $k = 0;
        $surname = "none";
        $first_name = "none";
        $other_names = "none";
        $account_no = "none";
        $id = 0;
        $line_length = strlen($line);
        $line_no = 0;
        include "../inc/db_open.php";
        //echo "<br>Line length = $line_length";
        while ($i < $line_length) {
            $k += 1;
            if ($k > 20000) {
                echo "<br>Looping around line 67";
                exit(16);
            }
            $i = strpos($line, "<", $j);
            //echo "<br>i = $i";
            if ($i === false) {
                $i = $line_length;
                //echo "<br>No start character found.";
                continue;
            }
            $j = strpos($line, ">", $i);
            //echo "<br>j = $j";
            $tag = substr($line, $i + 1, $j - $i - 1);
            $full_tag = $tag;
            $end_tag = strpos($tag, " ");
            if ($end_tag > 0) {
                //echo "<br>Full tag: " . $tag;
                $tag = substr($tag, 0, $end_tag);
                //echo "<br>Found compound tag: [" . $tag . "]";
            }
            $string_start = $j + 1;
            //echo "<br>Tag = $tag";
            switch ($tag) {
            case "/row":
                //echo "<br>Case: $tag";
                $line_no += 1;
                //echo "<br>Line No: $line_no";
                if ($line_no == 1) {
                    break;
                }
                //if ($full_name == "NAME/") {
                //    break;
                //}
                $rows = '';
                if (!empty($id_no)) {
                    $sql = 'select * from people where id_no = ?';
                    $rows = query($sql, $id_no);
                }
                if (empty($rows)) {
                    if (!empty($account_no)) {
                        $sql = 'select * from people where account_no = ?';
                        $rows = query($sql, $account_no);
                    }
                }
                //echo "<br>";
                if (empty($rows)) {
                    echo '<br>No match on ID or Account numbers';
                    echo "<br>Name=$full_name";
                    echo "<br>ID No=$id_no";
                    echo "<br>Account No=$account_no";
                    echo "<br>Phone1=$phone1";
                    if (!empty($phone2)) {
                        echo "<br>Phone2=$phone2";
                    }
                    if (!empty($phone3)) {
                        echo "<br>Phone3=$phone3";
                    }
                    echo "<br>Email1=$email1";
                    if (!empty($email2)) {
                        echo "<br>Email2=$email2";
                    }
                    if (!empty($email3)) {
                        echo "<br>Email3=$email3";
                    }
                    echo "<br>Car_Reg=$car_reg";
                    echo "<br>Driver=$driver";
                    echo "\n";
                    break;
                }
                // We have found a matching row, now look for matching fields
                echo "<br>Name: " . $rows[0]['surname'] . ", " . $rows[0]["first_name"] . " ($full_name)" . "\n";
                if ($rows[0]["id_no"] <> $id_no) {
                    echo "<br>ID No: " . $rows[0]["id_no"] . " ($id_no)" . "\n";
                }
                if ($rows[0]["account_no"] <> $account_no) {
                    echo "<br>Account No: " . $rows[0]["account_no"] . " ($account_no)" . "\n";
                }
                $show_phones = false;
                $my_phone = preg_replace('/\s/', '', $phone1);
                if (!empty($my_phone)) {
                    //echo "<br>My Phone - " . $my_phone , " - " . $phone1;
                    if (preg_replace('/\s/', '', $rows[0]["home_phone"]) <> $my_phone
                        && preg_replace('/\s/', '', $rows[0]["mobile_phone"]) <> $my_phone
                        && preg_replace('/\s/', '', $rows[0]["work_phone"]) <> $my_phone
                    ) {
                        echo "<br>Phone No 1 ($phone1) not on database" . "\n";
                        $show_phones = true;
                    }
                }
                $my_phone = preg_replace('/\s/', '', $phone2);
                if (!empty($my_phone)) {
                    //echo "<br>My Phone - " . $my_phone , " - " . $phone2;
                    if (preg_replace('/\s/', '', $rows[0]["home_phone"]) <> $my_phone
                        && preg_replace('/\s/', '', $rows[0]["mobile_phone"]) <> $my_phone
                        && preg_replace('/\s/', '', $rows[0]["work_phone"]) <> $my_phone
                    ) {
                        echo "<br>Phone No 2 ($phone2) not on database" . "\n";
                        $show_phones = true;
                    }
                }
                $my_phone = preg_replace('/\s/', '', $phone3);
                if (!empty($my_phone)) {
                    //echo "<br>My Phone - " . $my_phone , " - " . $phone3;
                    if (preg_replace('/\s/', '', $rows[0]["home_phone"]) <> $my_phone
                        && preg_replace('/\s/', '', $rows[0]["mobile_phone"]) <> $my_phone
                        && preg_replace('/\s/', '', $rows[0]["work_phone"]) <> $my_phone
                    ) {
                        echo "<br>Phone No 3 ($phone3) not on database" . "\n";
                        $show_phones = true;
                    }
                }
                if ($show_phones === true) {
                    echo "<br>Database has the following:";
                    if (!empty($rows[0]["home_phone"])) {
                        echo "<br>&nbsp;Home&nbsp; - " . $rows[0]["home_phone"];
                    }
                    if (!empty($rows[0]["work_phone"])) {
                        echo "<br>&nbsp;&nbsp;Work&nbsp; - " . $rows[0]["work_phone"];
                    }
                    if (!empty($rows[0]["mobile_phone"])) {
                        echo "<br>&nbsp;Mobile - " . $rows[0]["mobile_phone"] . "\n";
                    }
                }
                $show_emails = false;
                $home_email = strtolower($rows[0]["home_email"]);
                $work_email = strtolower($rows[0]["work_email"]);
                $my_email = strtolower($email1);
                if (!empty($my_email)) {
                    if ($work_email <> $my_email
                        && $home_email <> $my_email
                    ) {
                        echo "<br>Email 1 ($email1) is not on the database.\n";
                        $show_emails = true;
                    }
                }
                $my_email = strtolower($email2);
                if (!empty($my_email)) {
                    if ($work_email <> $my_email
                        && $home_email <> $my_email
                    ) {
                        echo "<br>Email 2 ($email2) is not on the database.\n";
                        $show_emails = true;
                    }
                }
                $my_email = strtolower($email3);
                if (!empty($my_email)) {
                    if ($work_email <> $my_email
                        && $home_email <> $my_email
                    ) {
                        echo "<br>Email 2 ($email3) is not on the database.\n";
                        $show_emails = true;
                    }
                }
                $emails_found = false;
                if ($show_emails === true) {
                    echo "<br>Database has the following:";
                    if (!empty($rows[0]["home_email"])) {
                        echo "<br>&nbsp;Home&nbsp; - " . $rows[0]["home_email"];
                        $emails_found = true;
                    }
                    if (!empty($rows[0]["work_email"])) {
                        echo "<br>&nbsp;&nbsp;Work&nbsp; - " . $rows[0]["work_email"] . "\n";
                        $emails_found = true;
                    }
                    if (!$emails_found) {
                        echo "<br>&nbsp;&nbsp;No email addresses found.";
                    }
                }
                if ($rows[0]["driver_lic"] <> $driver) {
                    echo "<br>Driver License: " . $rows[0]["driver_lic"] . " ($driver)" . "\n";
                }
                break;
            case "row":
                if ($line_no == 0) {
                    break;
                }
                echo "<br>";
                //echo "<br><br>Start of a new row";
                $full_name = "";
                $first_name = "";
                $surname = "";
                $id_no = "";
                $account_no = "";
                $phone1 = "";
                $phone2 = "";
                $phone3 = "";
                $email1 = "";
                $email2 = "";
                $email3 = "";
                $car_reg = "";
                $driver = "";
                $column = 0;
                break;
            case "para":
                if ($line_no == 0) {
                    break;
                }
                //echo "<br>Look for '/para' and recognise the string";
                $m = strpos($line, "</para>", $string_start);
                //echo "<br>m = $m";
                //echo "<br>string start = $string_start";
                $my_string = trim(substr($line, $string_start, $m - $string_start));
                $compact_string = preg_replace("/\s+/", "", $my_string);
                //echo "<br>My string = $my_string";
                if (strlen($compact_string) == 13
                    && is_numeric($compact_string)
                ) {
                    $id_no = $compact_string;
                } elseif ($my_string == "N/A") {
                    $my_string = "";
                } elseif (strlen($compact_string) == 10
                    && is_numeric($compact_string)
                ) {
                    if (empty($phone1)) {
                        $phone1 = $my_string;
                    } elseif (empty($phone2)) {
                        $phone2 = $my_string;
                    } else {
                        $phone3 = $my_string;
                    }
                } elseif (strlen($my_string) == 8
                    && !is_numeric(substr($my_string, 0, 2))
                ) {
                    $car_reg = $my_string;
                } elseif (strlen($my_string) > 11
                    && !is_numeric(substr($my_string, -4, 4))
                    && is_numeric(substr($my_string, 3, 3))
                ) {
                    $driver = trim($my_string);
                } elseif (strlen($my_string) == 6
                    && !is_numeric(substr($my_string, 0, 4))
                    && is_numeric(substr($my_string, 4, 2))
                ) {
                    $account_no = $my_string;
                } elseif (filter_var($my_string, FILTER_VALIDATE_EMAIL)) {
                    //echo "<br>Valid email: " . $my_string;
                    if (empty($email1)) {
                        $email1 = $my_string;
                    } elseif (empty($email2)) {
                        $email2 = $my_string;
                    } else {
                        $email3 = $my_string;
                    }
                } else {
                    //echo "<br>Not a valid email: " . $my_string;
                    if (substr($my_string, 0, 6) == "<ulink") {
                        break;
                    }
                    if (empty($full_name)) {
                        $full_name = trim($my_string);
                    } else {
                        //echo "<br>Line No is: " . $line_no;
                        echo "<br>What is this?: $my_string";
                    }
                }
                break;
            case "ulink":
                //echo "<br>Found tag " . $full_tag;
                $m = strpos($line, "</ulink>", $string_start);
                //echo "<br>m = $m";
                //echo "<br>string start = $string_start";
                $my_string = substr($line, $string_start, $m - $string_start);
                //echo "<br>Email address is " . $my_string . " - " . $tag;
                if (empty($email1)) {
                    $email1 = $my_string;
                } elseif (empty($email2)) {
                    $email2 = $my_string;
                } else {
                    $email3 = $my_string;
                }
                break;
            default:
                //echo "<br>We do not care much about $tag";
            }
        }
    } else {
        echo "<h3>Document file not found</h3>";
    }
    //render(
    //    "../page/librarymembers_form.php", 
    //    ["title" => "Reconciliation of Library Associates against SPRV.CO.ZA"]
    //);
} else {
    $error = false;
    $message = "";
    $_SESSION["doc_date"] = date("m");
    //$_SESSION["mnth_c"] = strtoupper(date("M"));
    //$_SESSION["accperiod"] = ((int)date('m') + 8) % 12 + 1;
    //$_SESSION["readingdate"] = date("d/m/Y");
    //$_SESSION["yr_c"] = date("Y");
    //$_SESSION["yr"] = (int)date("Y");
    $_SESSION["doc_file"] = "none";
    $_SESSION["rep_file"] = "library_" . date("Ymd") . ".txt";
    include "../inc/head.php";
    include "../inc/body.php";
    include "../page/menu.php";
    //var_dump($_SESSION);
    echo '<h2 align="center">Library Members Reconciliation</h2>';
    echo '<h3 align="left">Please select:</h3>';
    echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post"';
    echo ' enctype="multipart/form-data">' . "\n";
    echo '<input type="hidden" name="MAX_FILE_SIZE" value="50000" />' . "\n";
    echo '<table cellspacing=0 cellpadding=4>';
    echo '<tr>';
    echo '<td><label for="doc_date">Document date:</label></td>';
    echo '<td><input type="date" id="doc_date" name="doc_date" ';
    echo 'required autofocus></td></tr>';
    echo '<tr>';
    echo '<td><label for="doc_file">Library file - XML format: </label></td>';
    echo '<td><input type="file" id="doc_file" name="doc_file" ';
    echo 'accept=".xml" required>';
    echo '</td>';
    echo '</tr>';
    echo '</table>';
    echo '<input type="submit">';
    echo '</div>';
    echo '<br>';
    //        render(
    //    "../page/elec_form.php", 
    //    ["title" => "Electricity charges for current month"]
    //);
    include "../inc/footer.php";
}

?>
