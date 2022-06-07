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
    echo '<a href="../page/logout.php" class="w3-bar-item w3-button">Log off</a>';
    echo '<a href="../page/contact.php" class="w3-bar-item w3-button">Contact</a>';
    echo '<a href="../page/password.php" class="w3-bar-item w3-button">Password</a>';
    echo '<div class="w3-dropdown-hover">';
        echo '<button class="w3-button">Documents</button>';
            echo '<div class="w3-dropdown-content w3-bar-block w3-card-4">';
            echo '<a href="../page/policies.php" class="w3-bar-item w3-button">';
            echo 'View Documents</a>';
    if (check_role("STAFF") | check_role("ADMIN")) {
            echo '<a href="../page/docs_add.php" class="w3-bar-item w3-button">';
            echo 'Add documents</a>';
            echo '<a href="../page/docs_edit.php" class="w3-bar-item w3-button">';
            echo 'Edit document names</a>';
            echo '<a href="../page/docs_delete.php" class="w3-bar-item w3-button">';
            echo 'Delete documents</a>';
    }
            echo '</div>';
    echo '</div>';
    echo '<a href="../page/search.php" class="w3-bar-item w3-button">Search</a> ';
    echo '<div class="w3-dropdown-hover">';
        echo '<button class="w3-button">Tasks</button>';
            echo '<div class="w3-dropdown-content w3-bar-block w3-card-4">';
              echo '<a href="../page/job_create.php" class="w3-bar-item w3-button">';
              echo 'Create a new task</a> ';
              echo '<a href="../page/job.php" class="w3-bar-item w3-button">';
              echo 'Show tasks</a> ';
    if (check_role("STAFF") | check_role("ADMIN")) {
            echo '<a href="../page/proj_list.php" class="w3-bar-item w3-button">';
            echo 'Projects</a>';
              // echo '<a href="../page/job_report.php" ';
              //echo 'class="w3-bar-item w3-button">Tasks Report</a> ';
              echo '<hr><a href="../page/jobsrep01.php" ';
              echo 'class="w3-bar-item w3-button">Tasks created</a>';
              echo '<a href="../page/jobsrep02.php" ';
              echo 'class="w3-bar-item w3-button">Tasks closed</a>';
              echo '<a href="../page/jobsrep03.php" ';
              echo 'class="w3-bar-item w3-button">Hours worked</a>';
    }
            echo '</div>';
    echo '</div>';
} else {
    echo '<a href="../page/login.php" class="w3-bar-item w3-button">Log in</a> ';
    echo '<a href="../page/contact.php" class="w3-bar-item w3-button">Contact</a>';
}
if (check_role("STAFF") | check_role("ADMIN")) {
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">Administration</button>';
        echo '<div class="w3-dropdown-content w3-bar-block w3-card-4">';
        echo '<a href="../page/people.php" class="w3-bar-item w3-button">People</a>';
        echo '<a href="../page/people_assets.php" class="w3-bar-item w3-button">';
        echo 'People and Assets</a>';
        // echo '<a href="../page/history.php" ';
        // echo 'class="w3-bar-item w3-button">People history</a>';
        // echo '<a href="../page/people_related.php" ';
        // echo 'class="w3-bar-item w3-button">People relationships</a>';
    if (check_role("ADMIN")) {
        echo '<hr>';
        echo '<a href="../page/dashboard01.php" ';
        echo 'class="w3-bar-item w3-button">Dashboard</a>';
        echo '<a href="../page/password_force.php" ';
        echo 'class="w3-bar-item w3-button">Password force</a>';
        echo '<a href="../page/phone_list.php" ';
        echo 'class="w3-bar-item w3-button">Phone list - Residents</a>';
        // echo '<a href="../page/register.php" ';
        // echo 'class="w3-bar-item w3-button">Register</a>';
        echo '<a href="../page/roles.php" class="w3-bar-item w3-button">Roles</a>';
        echo '<a href="../page/user_list.php" ';
        echo 'class="w3-bar-item w3-button">Users</a>';
        echo '<a href="../page/librarymembers.php" ';
        echo 'class="w3-bar-item w3-button">Library Members</a>';
        // echo '<a href="../page/user_roles.php" ';
        // echo 'class="w3-bar-item w3-button">User roles</a>';
        // echo '<a href="../page/history_date_fix.php" ';
        // echo 'class="w3-bar-item w3-button">History date fix</a>';
    }
        echo '</div>';
    echo '</div>';
}
if (check_role("CC") | check_role("ADMIN")) {
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">Care Centre</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-card-4">';
    echo '<a href="../page/medhist.php" class="w3-bar-item w3-button">';
    echo 'Medical History</a>';
    if (check_role("ADMIN")) {
        // echo '<a href="../page/int_add.php" class="w3-bar-item w3-button">';
        // echo 'Interventions</a>';
        // echo '<hr><a href="../page/med_history_date_fix.php" ';
        // echo 'class="w3-bar-item w3-button">Medical history date fix</a>';
    }
    echo '</div>';
    echo '</div>';
}
if (check_role("FINANCE") | check_role("ADMIN")) {
    echo '<div class="w3-dropdown-hover">';
    echo '<button class="w3-button">Finance</button>';
    echo '<div class="w3-dropdown-content w3-bar-block w3-card-4">';
    echo '<a href="../page/elec.php" class="w3-bar-item w3-button">';
    echo 'Electricity billing</a>';
    echo '<a href="../page/electricity_history3.php" ';
    echo 'class="w3-bar-item w3-button">Electricity history</a>';
    echo '<a href="../page/hroom.php" class="w3-bar-item w3-button">';
    echo 'Hibiscus Room billing</a>';
    echo '<a href="../page/phone.php" class="w3-bar-item w3-button">';
    echo 'Phone billing</a>';
    // if(check_role("ADMIN")) {
    // echo '<hr><a href="../page/med_history_date_fix.php" ';
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
    echo '<a href="../page/birthday.php" class="w3-bar-item w3-button">';
    echo 'Birthdays</a>';
    echo '<a href="../page/electricity_history3.php" ';
    echo 'class="w3-bar-item w3-button">Electricity history</a>';
    echo '<a href="../page/news_list.php" class="w3-bar-item w3-button">News</a>';
    echo '<a href="../page/orgchart.php" class="w3-bar-item w3-button">';
    echo 'Organisation Chart</a>';
    //echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    //echo 'Phone history</a>';
    if (check_role("LIBRARY")) {
        echo '<a href="../page/lib_memberships_list.php" class="w3-bar-item w3-button">';
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
    //echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    //echo 'Account Number ?</a>';
    echo '<a href="../page/addtyp_list.php" class="w3-bar-item w3-button">';
    echo 'Address Types</a>';
    echo '<a href="../page/assphone_list.php" class="w3-bar-item w3-button">';
    echo 'Asset Phones</a>';
    echo '<a href="../page/asstyp_list.php" class="w3-bar-item w3-button">';
    echo 'Asset Types</a>';
    echo '<a href="../page/asset_list.php" class="w3-bar-item w3-button">';
    echo 'Assets</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'At The Gate ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Audit Trail ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Billing Responsibility ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Colour ?</a>';
    echo '<a href="../page/company.php" class="w3-bar-item w3-button">Companies</a>';
    echo '<a href="../page/country.php" class="w3-bar-item w3-button">Countries</a>';
    echo '<a href="../page/dept_list.php" class="w3-bar-item w3-button">';
    echo 'Departments</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Department Membership ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Disciplines ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Distribution Lists ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Documents ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Electricity Records ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Jobs History ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Logon History ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Medical Procedures ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'News ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'News Reports ?</a>';
    echo '<a href="../page/occupation.php" class="w3-bar-item w3-button">';
    echo 'Occupations</a>';
    echo '<a href="../page/parms.php" class="w3-bar-item w3-button">Parameters</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Payments ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Phone Records ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Phone Responsibilities ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Places ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Policy Control ?</a>';
    echo '<a href="../page/proj_list.php" class="w3-bar-item w3-button">';
    echo 'Projects</a>';
    echo '<a href="../page/reg_list.php" class="w3-bar-item w3-button">';
    echo 'Regions ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Residents & Services ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Skills ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Status ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Titles ?</a>';
    echo '<a href="../page/construction_form.php" class="w3-bar-item w3-button">';
    echo 'Vehicles ?</a>';
    echo '</div>';
    echo '</div>';
}
?>
  </div>
</div>
