<div class="w3-container">
  <div class="w3-bar w3-light-grey">
<?php
/**
 * Program: menu
 * 
 * Display relevant parts of main menu.
 * php version 5
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */
if ($_SESSION["id"] !== "0") {
    echo '<a href="../ctl/logout.php" class="w3-bar-item w3-button">Log off</a>';
    echo '<a href="../ctl/contact.php" class="w3-bar-item w3-button">Contact</a>';
    echo '<a href="../ctl/password.php" class="w3-bar-item w3-button">Password</a>';
    echo '<div class="w3-dropdown-hover">';
        echo '<button class="w3-button">Documents</button>';
            echo '<div class="w3-dropdown-content w3-bar-block w3-card-4">';
            echo '<a href="../ctl/policies.php" class="w3-bar-item w3-button">';
            echo 'View Documents</a>';
    if (check_role("STAFF") | check_role("ADMIN")) {
            echo '<a href="../view/docs_add.php" class="w3-bar-item w3-button">';
            echo 'Add documents</a>';
            echo '<a href="../view/docs_edit.php" class="w3-bar-item w3-button">';
            echo 'Edit document names</a>';
            echo '<a href="../view/docs_delete.php" class="w3-bar-item w3-button">';
            echo 'Delete documents</a>';
    }
            echo '</div>';
    echo '</div>';
    echo '<a href="../ctl/search.php" class="w3-bar-item w3-button">Search</a> ';
    echo '<div class="w3-dropdown-hover">';
        echo '<button class="w3-button">Tasks</button>';
            echo '<div class="w3-dropdown-content w3-bar-block w3-card-4">';
              echo '<a href="../ctl/job_create.php" class="w3-bar-item w3-button">';
              echo 'Create a new task</a> ';
              echo '<a href="../ctl/job.php" class="w3-bar-item w3-button">';
              echo 'Show tasks</a> ';
    if (check_role("STAFF") | check_role("ADMIN")) {
            echo '<a href="../view/proj_list.php" class="w3-bar-item w3-button">';
            echo 'Projects</a>';
              // echo '<a href="../ctl/job_report.php" ';
              //echo 'class="w3-bar-item w3-button">Tasks Report</a> ';
              echo '<hr><a href="../view/jobsrep01.php" ';
              echo 'class="w3-bar-item w3-button">Tasks created</a>';
              echo '<a href="../view/jobsrep02.php" ';
              echo 'class="w3-bar-item w3-button">Tasks closed</a>';
              echo '<a href="../view/jobsrep03.php" ';
              echo 'class="w3-bar-item w3-button">Hours worked</a>';
    }
            echo '</div>';
    echo '</div>';
} else {
    echo '<a href="../ctl/login.php" class="w3-bar-item w3-button">Log in</a> ';
    echo '<a href="../ctl/contact.php" class="w3-bar-item w3-button">Contact</a>';
}
if (check_role("STAFF") | check_role("ADMIN")) {
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">Administration</button>';
        echo '<div class="w3-dropdown-content w3-bar-block w3-card-4">';
        echo '<a href="../ctl/people.php" class="w3-bar-item w3-button">People</a>';
        echo '<a href="../ctl/people_assets.php" class="w3-bar-item w3-button">';
        echo 'People and Assets</a>';
        // echo '<a href="../ctl/history.php" ';
        // echo 'class="w3-bar-item w3-button">People history</a>';
        // echo '<a href="../ctl/people_related.php" ';
        // echo 'class="w3-bar-item w3-button">People relationships</a>';
    if (check_role("ADMIN")) {
        echo '<hr>';
        echo '<a href="../ctl/dashboard01.php" ';
        echo 'class="w3-bar-item w3-button">Dashboard</a>';
        echo '<a href="../ctl/password_force.php" ';
        echo 'class="w3-bar-item w3-button">Password force</a>';
        echo '<a href="../view/phone_list.php" ';
        echo 'class="w3-bar-item w3-button">Phone list - Residents</a>';
        // echo '<a href="../ctl/register.php" ';
        // echo 'class="w3-bar-item w3-button">Register</a>';
        echo '<a href="../ctl/roles.php" class="w3-bar-item w3-button">Roles</a>';
        echo '<a href="../view/user_list.php" ';
        echo 'class="w3-bar-item w3-button">Users</a>';
        echo '<a href="../ctl/librarymembers.php" ';
        echo 'class="w3-bar-item w3-button">Library Members</a>';
        // echo '<a href="../ctl/user_roles.php" ';
        // echo 'class="w3-bar-item w3-button">User roles</a>';
        // echo '<a href="../ctl/history_date_fix.php" ';
        // echo 'class="w3-bar-item w3-button">History date fix</a>';
    }
        echo '</div>';
    echo '</div>';
}
if (check_role("CC") | check_role("ADMIN")) {
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">Care Centre</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-card-4">';
    echo '<a href="../ctl/medhist.php" class="w3-bar-item w3-button">';
    echo 'Medical History</a>';
    if (check_role("ADMIN")) {
        // echo '<a href="../view/int_add.php" class="w3-bar-item w3-button">';
        // echo 'Interventions</a>';
        // echo '<hr><a href="../ctl/med_history_date_fix.php" ';
        // echo 'class="w3-bar-item w3-button">Medical history date fix</a>';
    }
    echo '</div>';
    echo '</div>';
}
if (check_role("FINANCE") | check_role("ADMIN")) {
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">Finance</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-card-4">';
    echo '<a href="../ctl/elec.php" class="w3-bar-item w3-button">';
    echo 'Electricity billing</a>';
    echo '<a href="../view/electricity_history3.php" ';
    echo 'class="w3-bar-item w3-button">Electricity history</a>';
    echo '<a href="../ctl/hroom.php" class="w3-bar-item w3-button">';
    echo 'Hibiscus Room billing</a>';
    echo '<a href="../ctl/phone.php" class="w3-bar-item w3-button">';
    echo 'Phone billing</a>';
    // if(check_role("ADMIN")) {
    // echo '<hr><a href="../ctl/med_history_date_fix.php" ';
    // echo 'class="w3-bar-item w3-button">Medical history date fix</a>';
    // }
    echo '</div>';
    echo '</div>';
}
if (check_role("STAFF") | check_role("ADMIN") | check_role("RESIDENT")
) {
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">General</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-card-4">';
    echo '<a href="../ctl/birthday.php" class="w3-bar-item w3-button">';
    echo 'Birthdays</a>';
    echo '<a href="../view/electricity_history3.php" ';
    echo 'class="w3-bar-item w3-button">Electricity history</a>';
    echo '<a href="../view/news_list.php" class="w3-bar-item w3-button">News</a>';
    echo '<a href="../view/orgchart.php" class="w3-bar-item w3-button">';
    echo 'Organisation Chart</a>';
    //echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    //echo 'Phone history</a>';
    if (check_role("LIBRARY")) {
        echo '<a href="../view/lib_memberships_list.php" class="w3-bar-item w3-button">';
        echo 'Library Members</a>';
    }
    echo '</div>';
    echo '</div>';
}
if (check_role("STAFF") | check_role("ADMIN") 
) {
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">Setup</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-card-4">';
    //echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    //echo 'Account Number ?</a>';
    echo '<a href="../view/addtyp_list.php" class="w3-bar-item w3-button">';
    echo 'Address Types</a>';
    echo '<a href="../view/assphone_list.php" class="w3-bar-item w3-button">';
    echo 'Asset Phones</a>';
    echo '<a href="../view/asstyp_list.php" class="w3-bar-item w3-button">';
    echo 'Asset Types</a>';
    echo '<a href="../view/asset_list.php" class="w3-bar-item w3-button">';
    echo 'Assets</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'At The Gate ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Audit Trail ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Billing Responsibility ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Colour ?</a>';
    echo '<a href="../ctl/company.php" class="w3-bar-item w3-button">Companies</a>';
    echo '<a href="../ctl/country.php" class="w3-bar-item w3-button">Countries</a>';
    echo '<a href="../view/dept_list.php" class="w3-bar-item w3-button">';
    echo 'Departments</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Department Membership ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Disciplines ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Distribution Lists ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Documents ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Electricity Records ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Jobs History ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Logon History ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Medical Procedures ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'News ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'News Reports ?</a>';
    echo '<a href="../ctl/occupation.php" class="w3-bar-item w3-button">';
    echo 'Occupations</a>';
    echo '<a href="../ctl/parms.php" class="w3-bar-item w3-button">Parameters</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Payments ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Phone Records ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Phone Responsibilities ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Places ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Policy Control ?</a>';
    echo '<a href="../view/proj_list.php" class="w3-bar-item w3-button">';
    echo 'Projects</a>';
    echo '<a href="../view/reg_list.php" class="w3-bar-item w3-button">';
    echo 'Regions ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Residents & Services ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Skills ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Status ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Titles ?</a>';
    echo '<a href="../view/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Vehicles ?</a>';
    echo '</div>';
    echo '</div>';
}
?>
  </div>
</div>
