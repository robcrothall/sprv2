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
require "../conf/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rec_id = $_SESSION["rec_id"];
    $_SESSION["people_id"] = $rec_id;
    $_SESSION["selected_people_id"] = $rec_id;
    $rows = query("select * from people where id=?", $rec_id);
    /*
    if (empty($_POST[""])) {
        $ = "";
    } else {
    */
    if (empty($_POST["surname"])) {
        $surname = "";
    } else {
        $surname = trim(
            substr(
                htmlspecialchars(
                    strip_tags(ucwords($_POST['surname'])), 
                    ENT_COMPAT
                ), 0, 50
            )
        );
    }
    if (strpos($surname, "&amp;") !== false) {
            $surname = str_replace("&amp;", "&", $surname);
    } 
    if ($surname = strtoupper($surname)) {
        $surname = ucwords(strtolower($surname));
    }
    if (empty($_POST["first_name"])) {
        $first_name = "";
    } else {
        $first_name = trim(
            substr(
                htmlspecialchars(
                    strip_tags(ucwords($_POST['first_name'] ?: "")), 
                    ENT_COMPAT
                ), 0, 50
            )
        );
    }
    if (strpos($first_name, "&amp;") !== false) {
            $first_name = str_replace("&amp;", "&", $first_name);
    } 
    if ($first_name = strtoupper($first_name)) {
        $first_name = ucwords(strtolower($first_name));
    }
    if (empty($_POST["other_name"])) {
        $other_name = "";
    } else {
        $other_name     =trim(
            substr(
                htmlspecialchars(
                    strip_tags(ucwords($_POST['other_name'] ?: "")), 
                    ENT_COMPAT
                ), 0, 50
            )
        );
    }
    if (strpos($other_name, "&amp;") !== false) {
        $other_name = str_replace("&amp;", "&", $other_name);
    } 
    if ($other_name = strtoupper($other_name)) {
        $other_name = ucwords(strtolower($other_name));
    }
    if (empty($_POST["given_name"])) {
        $given_name = "";
    } else {
        $given_name = trim(
            substr(
                htmlspecialchars(
                    strip_tags(ucwords($_POST['given_name'] ?: "")), 
                    ENT_COMPAT
                ), 0, 50
            )
        );
    }
    if (strpos($given_name, "&amp;") !== false) {
        $given_name = str_replace("&amp;", "&", $given_name);
    } 
    if ($given_name = strtoupper($given_name)) {
        $given_name = ucwords(strtolower($given_name));
    }
    if (empty($_POST["title"])) {
        $title = "";
    } else {
        $title = trim(
            substr(
                htmlspecialchars(
                    strip_tags(ucwords($_POST['title'] ?: "")), 
                    ENT_COMPAT
                ), 0, 50
            )
        );
    }
    if (strpos($title, "&amp;") !== false) {
            $title = str_replace("&amp;", "&", $title);
    } 
    if ($title = strtoupper($title)) {
        $title = ucwords(strtolower($title));
    }
    //        $marital_status =trim(substr(htmlspecialchars(strip_tags(ucwords(
    //            $_POST['marital_status'] ?: "U")), ENT_COMPAT),0,10));
    //        $account_no     =trim(substr(htmlspecialchars(strip_tags(ucwords(
    //            $_POST['account_no'] ?: "")), ENT_COMPAT),0,10));
    if (empty($_POST["old_account_no"])) {
        $old_account_no = "";
    } else {
        $old_account_no =trim(
            substr(
                htmlspecialchars(
                    strip_tags(ucwords($_POST['old_account_no'] ?: "")), 
                    ENT_COMPAT
                ), 0, 10
            )
        );
    }
    $status = trim(
        substr(
            htmlspecialchars(
                strip_tags($_POST['status'] ?: ""), 
                ENT_COMPAT
            ), 0, 20
        )
    );
    $status_date = trim(
        substr(
            htmlspecialchars(
                strip_tags($_POST['status_date'] ?: ""), 
                ENT_COMPAT
            ), 0, 10
        )
    );
    if ($status != $rows[0]["status"]) {
        if ($status_date = $rows[0]["status_date"]) {
            $status_date = date("Y/m/d");
        }
    }
    $id_no          =test_input($_POST['id_no'] ?: "");
    $birth_date     =test_input($_POST['birth_date'] ?: "");
    $bd_disclose    =test_input($_POST['bd_disclose'] ?: "");
    $home_phone     =test_input($_POST['home_phone'] ?: "");
    $work_phone     =test_input($_POST['work_phone'] ?: "");
    $mobile_phone   =test_input($_POST['mobile_phone'] ?: "");
    $mp_disclose    =test_input($_POST['mp_disclose'] ?: "");
    $whatsapp       =test_input($_POST['whatsapp'] ?: "?");
    $home_email     =test_input($_POST['home_email'] ?: "");
    $he_disclose    =test_input($_POST['he_disclose'] ?: "");
    $work_email     =test_input($_POST['work_email'] ?: "");
    $sex            =test_input($_POST['sex'] ?: "U");
    $passport_no    =test_input($_POST['passport_no'] ?: "");
    $passport_expiry=test_input($_POST['passport_expiry'] ?: "");
    $driver_lic     =test_input($_POST['driver_lic'] ?: "");
    $driver_expiry  =test_input($_POST['driver_expiry'] ?: "");
    $company_id     =test_input($_POST['company_id'] ?: 0);
    //$rs_rep_id = test_input($_POST['rs_rep_id'] ?: 0);
    $cottage        =test_input(ucwords($_POST['cottage'] ?: ""));
    $cottage_id     =test_input($_POST['cottage_id'] ?: 0);
    $occupation_id  =test_input($_POST['occupation_id'] ?: 0);
    $checked        =test_input($_POST['checked'] ?: "N");
    $notes          =test_input($_POST['notes']);
    $user_id        =htmlspecialchars(strip_tags($_SESSION['id']));
    // Do some validation
    $errMsg = "Update was successful. ";
    if (empty($surname)) {
        $errMsg .= "The surname should not be empty. ";
    }
    if (empty($status_date)) {
        $status_date = date("Y-m-d");
    }
    if (empty($birth_date)) {
        $birth_date = "1900-01-01";
    }
    if (empty($passport_expiry)) {
        $passport_expiry = "1900-01-01";
    }
    if (empty($driver_expiry)) {
        $driver_expiry = "1900-01-01";
    }
    if (!validateDate($status_date)) {
        $errMsg .= "The Status Date is invalid. ";
    } 
    if (!validateDate($birth_date)) {
        $errMsg .= "The Birth Date is invalid. ";
    } 
    if (!validateDate($passport_expiry)) {
        $errMsg .= "The Passport Expiry Date is invalid. ";
    } 
    if (!validateDate($driver_expiry)) {
        $errMsg .= "The Driver's Licence Expiry Date is invalid. ";
    } 
    //        if (!empty($errMsg)) {apologize($errMsg);}
    $rows = query(
        "update people set surname=?, first_name=?, other_name=?,given_name=?, " . 
        "title=?, old_account_no=?, status=?, status_date=?, " . 
        "id_no=?, birth_date=?, bd_disclose=?, home_phone=?, sex=?, " . 
        "passport_no=?, passport_expiry=?, driver_expiry=?, race=?, " .
        "work_phone=?, mobile_phone=?, mp_disclose=?, whatsapp=?, home_email=?, " . 
        "he_disclose=?, work_email=?, driver_lic=?, " . 
        "company_id=?, cottage=?, cottage_id=?, occupation_id=?, checked=?, " . 
        "notes=?, user_id=?, changed=CURRENT_TIMESTAMP() where id=?",
        $surname, $first_name, $other_name, $given_name, 
        $title, $old_account_no, $status, $status_date, 
        $id_no, $birth_date, $bd_disclose, $home_phone, $sex, 
        $passport_no, $passport_expiry, $driver_expiry, $race,
        $work_phone, $mobile_phone, $mp_disclose, $whatsapp, $home_email, 
        $he_disclose, $work_email, $driver_lic, 
        $company_id, $cottage, $cottage_id, $occupation_id, $checked, $notes, 
        $user_id, $rec_id
    );
    If ($rows === false) {
        /*          print_r($rec_id);
                    print_r(" - Surname:");
                    print_r($surname);
                    print_r(" - First name:");
                    print_r($first_name);
                    print_r(" - Other name:");
                    print_r($other_name);
                    print_r(" - Birth date:");
                    print_r($birth_date);
                    print_r(" - Passport expiry:");
                    print_r($passport_expiry);
                    print_r(" - Driver_expiry:");
                    print_r($driver_expiry);
                    print_r(" - Status:");
                    print_r($status);
                    print_r(" - Status Date:");
                    print_r($status_date);
                    print_r(" - Company ID:");
                    print_r($company_id);
                    print_r(" - Occupation ID:");
                    print_r($occupation_id);
                    print_r(" - RS Rep ID:");
                    print_r($rs_rep_id);
                    print_r(" - Notes:");
                    print_r($notes);
                    print_r(" - Length of notes:");
                    print_r(strlen($notes));
                    print_r(" - User ID:");
                    print_r($user_id);
        */  
        apologize("Update failed.  Have you created a duplicate account number?");
    } else {
        render(
            "../page/people_update_form.php", 
            ["title" => "Update People", "form_id" => "$rec_id", 
            "message" => "$errMsg"]
        );
    }
} else {
    $id = htmlspecialchars(strip_tags($_GET['id']));
    $_SESSION["rec_id"] = $id;
    render(
        "../page/people_update_form.php", ["title" => "Update a Person",
        "form_id" => "$id", "message" => ""]
    );
}
?>
