<?php
/**
 * Program: search
 * 
 * Build a search string and execute it.
 * php version 5
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */

// configuration
require_once "../inc/config.php"; 

// if form was submitted
//print_r($_SERVER["REQUEST_METHOD"]);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cmd_select = "SELECT distinct a.id, a.surname, a.first_name ";
    $cmd_select .= ", a.other_names, a.given_name ";
    $cmd_select .= "";
    $cmd_tables = " from people a";
    $cmd_where = " where ";
    $cmd_and = "";
    /*if (check_role("RESIDENT")) {
        $cmd_where .= " and a.company_id < 3 and a.company_id > 0 ";
    }*/
    $cmd_order_by = " order by surname, first_name";
    if (check_role("STAFF") | check_role("ADMIN")) {
        $cmd_limit = " limit 250";
    } else {
        $cmd_limit = " limit 50";
    }
    $search_string = " ";
    $message = "Selection: ";
    // build up the search string
    //var_dump($_POST);
    if (!empty($_POST["surname"])) {
        $search_string .= $cmd_and . "a.surname like '" . test_input($_POST['surname']) . "' ";
        $cmd_and = " and ";
        $message .= "Surname '" . test_input($_POST['surname']) . "'; ";
    }
    if (!empty($_POST["first_name"])) {
        $search_string .= $cmd_and . " (first_name like '" . test_input($_POST["first_name"]) . "' ";
        $cmd_and = " and ";
        $message .= "First name '" . test_input($_POST["first_name"]) . "'; ";
    }
    if (!empty($_POST["first_name"])) {
        $search_string .= "or other_name like '" . test_input($_POST["first_name"]) . "' ";
        $message .= "Other name '" . test_input($_POST["first_name"]) . "'; ";
    }
    if (!empty($_POST["first_name"])) {
        $search_string .= "or given_name like '" . test_input($_POST["first_name"]) . "') ";
        $message .= "Given name '" . test_input($_POST["first_name"]) . "'; ";
    }
    /*if (!empty($_POST["asset_name"])) {
        $cmd_tables .= ", asset d";
        $search_string .= $cmd_and . "d.asset_name like '" . test_input($_POST["asset_name"]) . "' ";
        $cmd_and = " and ";
        $message .= "Asset name '" . test_input($_POST["asset_name"]) . "'; ";
    }*/
    if (!empty($_POST["account_no"])) {
        $search_string .= $cmd_and . " (account_no like '" . test_input($_POST["account_no"]) . "%' ";
        $cmd_and = " and ";
        // $search_string .= "or old_account_no like '" . test_input($_POST["account_no"]) . "%') ";
        $message .= "Account No '" . test_input($_POST["account_no"]) . "'; ";
    }
    /* if (!empty($_POST["email"])) {
        $email = test_input($_POST["email"]);
        $search_string .= $cmd_and . " (work_email like '" . $email . "%' ";
        $search_string .= "or home_email like '" . $email . "%') ";
        $cmd_and = " and ";
        $message .= "Email address '" . $email . "%'; ";
    } */
    if (!empty($_POST["title"]) && test_input($_POST["title"]) != "any") {
        $search_string .= $cmd_and .  "title = '" . test_input($_POST["title"]) . "' ";
        $cmd_and = " and ";
        $message .= "Title '" . test_input($_POST["title"]) . "'; ";
    }
    /* if (!empty($_POST["status"]) && test_input($_POST["status"]) != "any") {
        $search_string .= $cmd_and . "status = '" . test_input($_POST["status"]) . "' ";
        $cmd_and = " and ";
        $message .= "Status '" . test_input($_POST["status"]) . "'; ";
        if (!empty($_POST["date_from"])) {
            $search_string .= "and status_date >= '" . test_input($_POST["date_from"]) . "' ";
            $message .= "Date from '" . test_input($_POST["date_from"]) . "'; ";
        }
        if (!empty($_POST["date_to"])) {
            $search_string .= "and status_date <= '" . test_input($_POST["date_to"]) . "' ";
            $message .= "Date to '" . test_input($_POST["date_to"]) . "'; ";
        }
    } */
    /*if (!empty($_POST["occupation_id"]) && test_input($_POST["occupation_id"]) != "any") {
        $search_string .= $cmd_and . "occupation_id = '" . test_input($_POST["occupation_id"]) . "' ";
        $cmd_and = " and ";
        $message .= "Occupation ID '" . test_input($_POST["occupation_id"]) . "'; ";
    } */
    /* if (!empty($_POST["company_id"]) && test_input($_POST["company_id"]) != "any") {
        $search_string .= $cmd_and . "company_id = '" . test_input($_POST["company_id"]) . "' ";
        $message .= "Company ID '" . test_input($_POST["company_id"]) . "'; ";
    } */
    if (!empty($_POST["checked"]) && test_input($_POST["checked"]) != "any") {
        $search_string .= $cmd_and . "checked = '" . test_input($_POST["checked"]) . "' ";
        $cmd_and = " and ";
        $message .= "Checked '" . test_input($_POST["checked"]) . "'; ";
    }
    /* if (!empty($_POST["phone"]) /*&& test_input($_POST["phone"]) != "any") {
        $search_string .= $cmd_and . " (home_phone like '%" . test_input($_POST["phone"]) . "' ";
        $search_string .= "or work_phone like '%" . test_input($_POST["phone"]) . "' ";
        $search_string .= "or mobile_phone like '%" . test_input($_POST["phone"]) . "') ";
        $cmd_and = " and ";
        $message .= "Phone '" . test_input($_POST["phone"]) . "'; ";
    } */
    $cmd_full = $cmd_select . $cmd_tables . $cmd_where . $search_string . $cmd_order_by . $cmd_limit;
    $message .= $cmd_full;
    render("../page/search_results_form.php", ["title" => "All People", "search_string" => $cmd_full, "message" => $message]);
} else {
    render("../page/search_form.php", ["title" => "Search for People"]);
}
?>
