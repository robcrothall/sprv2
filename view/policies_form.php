<div class="container">
<h2>Manuals and Guides</h2>
<p>The following documents are available for you to read:</p>
<ol>
  <li><a href="../assets/docs/Handbook_v1.8.pdf">Resident&apos;s Guide</a></li>
  <li><a href="../assets/docs/SPRV_Intranet_User_Manual_v1.9.pdf">SPRV Intranet User Manual v1.9</a></li>
  <li><a href="../assets/docs/SPRVintranet20211209.pdf">SPRV Intranet Presentation - February 2022</a></li>
</ol>
<h2>S-Parks</h2>
<ol>
<li><a href="../assets/docs/Sparks_133_20220527.pdf">S-Parks 133 2022-05-27</a></li>
<li><a href="../assets/docs/Sparks_132_20220520.pdf">S-Parks 132 2022-05-20</a></li>
<li><a href="../assets/docs/Sparks_131_20220513.pdf">S-Parks 131 2022-05-13</a></li>
<li><a href="../assets/docs/Sparks_130_20220505.pdf">S-Parks 130 2022-05-05</a></li>
<li><a href="../assets/docs/Sparks_129_20220422.pdf">S-Parks 129 2022-04-22</a></li>
<li><a href="../assets/docs/Sparks_128_20220414.pdf">S-Parks 128 2022-04-14</a></li>
<li><a href="../assets/docs/Sparks_127_20220408.pdf">S-Parks 127 2022-04-08</a></li>
<li><a href="../assets/docs/Sparks_126_20220401.pdf">S-Parks 126 2022-04-01</a></li>
<li><a href="../assets/docs/Sparks_125_20220325.pdf">S-Parks 125 2022-03-25</a></li>
<li><a href="../assets/docs/Sparks_124_20220318.pdf">S-Parks 124 2022-03-18</a></li>
<li><a href="../assets/docs/Sparks_123_20220311.pdf">S-Parks 123 2022-03-11</a></li>
</ol>
<h2>Silver Threads</h2>
<ol>
<li><a href="../assets/docs/SilverThreads_202205.pdf">Silver Threads 2022-05</a></li>
<li><a href="../assets/docs/SilverThreads_202204.pdf">Silver Threads 2022-04</a></li>
<li><a href="../assets/docs/SilverThreads_202203.pdf">Silver Threads 2022-03</a></li>
<li><a href="../assets/docs/SilverThreads_202202.pdf">Silver Threads 2022-02</a></li>
<li><a href="../assets/docs/SilverThreads_202112.pdf">Silver Threads 2021-12</a></li>
<li><a href="../assets/docs/SilverThreads_202111.pdf">Silver Threads 2021-11</a></li>
<li><a href="../assets/docs/SilverThreads_202109.pdf">Silver Threads 2021-09</a></li>
<li><a href="../assets/docs/SilverThreads_202108.pdf">Silver Threads 2021-08</a></li>
<li><a href="../assets/docs/SilverThreads_202105.pdf">Silver Threads 2021-05</a></li>
<li><a href="../assets/docs/SilverThreads_202012.pdf">Silver Threads 2020-12</a></li>
</ol>
<h2>Notices</h2>
<ol>
<li><a href="../assets/docs/Levy_increase_letter_20220414.pdf">Levy increase letter - 2022-04-14</a></a></li>
</ol>
<h2>Approved Policies and Procedures</h2>
<h3>Resident focus</h3>
  <table class="w3-table-all">
    <tr>
        <th style="width:500px">Policy</th>
        <th style="width:100px">Effective</th>
        <th style="width:100px">Review</th>       
    </tr>
    <tr>
        <td><a href="../assets/docs/SPRV_-_Cottage_Downsizing_Policy_20210121.pdf">Cottage Downsizing</a></td>
        <td>2021-01-21</td>
        <td>2023-01</td>
    </tr>
    <tr>
        <td><a href="../assets/docs/SPRV_-_Maintenance_of_Park_Property_20210121.pdf">Maintenance of Park Property</a></td>
        <td>2021-01-21</td>
        <td>2023-01</td>
    </tr>
    <tr>
        <td><a href="../assets/docs/SPRV_-_Management_of_feral_cats_20210121.pdf">Management of Feral Cats</a></td>
        <td>2021-01-21</td>
        <td>2023-01</td>
    </tr>
    <tr>
        <td><a href="../assets/docs/POPI_Act_Policy_-_20210629.pdf">Protection of Personal Information (PoPI)</a></td>
        <td>2021-07-16</td>
        <td>2023-07</td>
    </tr>
    <tr>
        <td><a href="../assets/docs/SPRV_-_Supporting_Residents_who_have_outlived_their_funds_20210121.pdf">Supporting Residents who have outlived their funds</a></td>
        <td>2021-01-21</td>
        <td>2023-01</td>
    </tr>
    <tr>
        <td><a href="../assets/docs/Vacating_of_Cottages_-_revised_20191115.pdf">Vacating of Cottages</a></td>
        <td>2019-11-15</td>
        <td>2022-11</td>
    </tr>
  </table>
<?php
/**
 * Documentation page
 * 
 * This stops non-staff from seeing draft policies and staff policies
 * PHP Version 7.1
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git-id>
 * @link     http://www.sprv.co.za
 */
if (check_role("STAFF")) {
    echo '<h2>Staff Policies</h2>';
    echo '<table class="w3-table-all">';
    echo '<tr>';
    echo '<th style="width:500px">Policy</th>';
    echo '<th style="width:100px">Effective</th>';
    echo '<th style="width:100px">Review</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td><a href="../assets/docs/LeavePolicy_202007.pdf">Leave Policy</a></td>';
    echo '<td>2021-07-16</td>';
    echo '<td>2023-07</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td><a href="../assets/docs/ManagementHandover.pdf">Management Handover</a></td>';
    echo '<td>2019-12-03</td>';
    echo '<td>2022-12</td>';
    echo '</tr>';
    echo '</table>';
    echo '<h2>Draft Policies and Procedures</h2>';
    echo '<ol>';
    echo '<li><a href="../assets/docs/acceptable_use_policy.docx">Acceptable Use Policy</a></li>';
    echo '<li><a href="../assets/docs/Settlers_Park-PPM_HR_Code_of_Conduct.pdf">Code of Conduct</a></li>';
    echo '<li><a href="../assets/docs/acceptable_encryption_policy.docx">Encryption</a></li>';
    echo '<li><a href="../assets/docs/Health_and_Safety_Committee_201906.docx">Health and Safety Committee</a></li>';
    echo '<li><a href="../assets/docs/SPRV_-_Policy_-_House_Rules_-_revised_Oct_2017.docx">House Rules</a></li>';
    echo '<li><a href="../assets/docs/internet_usage_policy.docx">Internet usage</a></li>';
    echo '<li><a href="../assets/docs/mobile_employee_endpoint_responsibility_policy.docx">Mobile employee endpoint responsibility</a></li>';
    echo '<li><a href="../assets/docs/pandemic_response_planning_policy.docx">Pandemic response planning</a></li>';
    echo '<li><a href="../assets/docs/personal_communication_devices_and_voicemail_policy.docx">Personal communication devices and voicemail</a></li>';
    echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Privacy_and_confidentiality_-_revised_Oct_2017.docx">Privacy and confidentiality</a></li>';
    echo '<li><a href="../assets/docs/Purchase_of_life_rights_for_parents.pdf">Purchase of life-rights for parents</a></li>';
    echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Refurbishment_-_revised_Oct_2017.docx">Refurbishment</a></li>';
    echo '<li><a href="../assets/docs/server_security_policy.docx">Server security</a></li>';
    echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Sexual_Harassment_-_revised_Oct_2017.docx">Sexual_Harassment</a></li>';
    echo '<li><a href="../assets/docs/Settlers_Park-PPM_HR_Sexual_Harassment_Policy.docx">Sexual Harassment</a></li>';
    echo '<li><a href="../assets/docs/software_installation_policy.docx">Software installation</a></li>';
    echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Staff_and_gifts.docx">Staff and gifts</a></li>';
    echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Staff_Loan_-_revised_Oct_2017.doc">Staff Loans</a></li>';
    echo '<li><a href="../assets/docs/virtual_private_network_policy.docx">Virtual private network policy</a></li>';
    echo '<li><a href="../assets/docs/wireless_communication_standard.docx">Wireless communication standard</a></li>';
    echo '<li><a href="../assets/docs/Settlers_Park-PPM_HR_Workplace_Violence_Prevention.pdf">Workplace Violence Prevention</a></li>';
    echo '<li><a href="../assets/docs/workstation_security_for_hipaa_policy.docx">Workstation security for Health Information</a></li>';
    echo '<li><a href="../assets/docs/dial_in_access_policy.docx">dial_in_access</a></li>';
    echo '<li><a href="../assets/docs/Training_Notes_-_SPA_standards_and_templates_-_01_07_2019.docx">Training_Notes_-_SPA_standards_and_templates_-_01_07_2019.docx</a></li>';
    echo '<li><a href="../assets/docs/Settlers_Park-PPM_HR_Conditions_of_Employment.pdf">Settlers_Park-PPM_HR_Conditions_of_Employment.pdf</a></li>';
    echo '<li><a href="../assets/docs/removable_media_policy.docx">removable_media</a></li>';
    echo '<li><a href="../assets/docs/VacatingCottages.pdf">Vacating Cottages.pdf</a></li>';
    echo '<li><a href="../assets/docs/social_engineering_awareness_policy.docx">Social engineering awareness</a></li>';
    echo '<li><a href="../assets/docs/email_policy.docx">email</a></li>';
    echo '<li><a href="../assets/docs/security_response_plan_policy.docx">Security_response_plan</a></li>';
    echo '<li><a href="../assets/docs/internet_dmz_equipment_policy.docx">internet_dmz_equipment</a></li>';
    echo '<li><a href="../assets/docs/bluetooth_baseline_requirements_policy.docx">bluetooth_baseline_requirements</a></li>';
    echo '<li><a href="../assets/docs/remote_access_mobile_computing_storage.docx">remote_access_mobile_computing_storage.docx</a></li>';
    echo '<li><a href="../assets/docs/disaster_recovery_plan_policy.docx">disaster_recovery_plan</a></li>';
    echo '<li><a href="../assets/docs/Settlers_Park-PPM_HR_Misconduct_Policy.pdf">Settlers_Park-PPM_HR_Misconduct_Policy.pdf</a></li>';
    echo '<li><a href="../assets/docs/remote_access_tools_policy.docx">remote_access_tools</a></li>';
    echo '<li><a href="../assets/docs/lab_security_policy.docx">lab_security</a></li>';
    echo '<li><a href="../assets/docs/password_construction_guidelines.docx">password_construction_guidelines.docx</a></li>';
    echo '<li><a href="../assets/docs/Settlers_Park-PPM_HR_Staff_engagement_process.docx">Settlers_Park-PPM_HR_Staff_engagement_process.docx</a></li>';
     echo '<li><a href="../assets/docs/risk_assessment_policy.docx">risk_assessment</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Notice_Boards_-_revised_Oct_2018.docx">Notice_Boards_-_revised_Oct_2018.docx</a></li>';
     echo '<li><a href="../assets/docs/automatically_forwarded_email_policy.docx">automatically_forwarded_email</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Staff_-_misconduct_and_disciplinary_process_-_revised_Oct_2017.doc">Staff_-_misconduct_and_disciplinary_process_-_revised_Oct_2017.doc</a></li>';
     echo '<li><a href="../assets/docs/Management_Handover.pdf">Management_Handover.pdf</a></li>';
     echo '<li><a href="../assets/docs/anti_virus_guidelines.docx">anti_virus_guidelines.docx</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Aesthetics_Committee_Policy_-_Revised_20191124_-_RobCa.docx">SPRV_-_Aesthetics_Committee_Policy_-_Revised_20191124_-_RobCa.docx</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Memberships_-_revised_Oct_2017.docx">Memberships_-_revised_Oct_2017.docx</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Subsidies_-_revised_Oct_2017.docx">Subsidies_-_revised_Oct_2017.docx</a></li>';
     echo '<li><a href="../assets/docs/Leave_Policy_20200328.docx">Leave_Policy_20200328.docx</a></li>';
     echo '<li><a href="../assets/docs/communications_equipment_policy.docx">communications_equipment</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Rental_-_revised_Oct_2017.docx">Rental_-_revised_Oct_2017.docx</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Vacating_of_Cottages_-_revised_20191115.docx">SPRV_-_Vacating_of_Cottages_-_revised_20191115.docx</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Memberships_-_05_11_2018.docx">Memberships_-_05_11_2018.docx</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Leave_-_revised_Oct_2018.docx">SPRV_-_Leave_-_revised_Oct_2018.docx</a></li>';
     echo '<li><a href="../assets/docs/clean_desk_policy.docx">clean_desk</a></li>';
     echo '<li><a href="../assets/docs/email_retention_policy.docx">email_retention</a></li>';
     echo '<li><a href="../assets/docs/Extra_Orders_Procedure_9_10_2019.docx">Extra_Orders_Procedure_9_10_2019.docx</a></li>';
     echo '<li><a href="../assets/docs/technology_equipment_disposal_policy.docx">technology_equipment_disposal</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Aesthetics_Committee_Policy_-_Revised_20191124_-_RobC.docx">SPRV_-_Aesthetics_Committee_Policy_-_Revised_20191124_-_RobC.docx</a></li>';
     echo '<li><a href="../assets/docs/lab_anti_virus_policy.docx">lab_anti_virus</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Vacating_of_Cottages_-_revised_20191115a.docx">SPRV_-_Vacating_of_Cottages_-_revised_20191115a.docx</a></li>';
     echo '<li><a href="../assets/docs/wireless_communication_policy.docx">wireless_communication</a></li>';
     echo '<li><a href="../assets/docs/data_breach_response.docx">data_breach_response.docx</a></li>';
     echo '<li><a href="../assets/docs/web_application_security_policy.docx">web_application_security</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Health_and_Safety_Policy_-_revised_20191227.docx">SPRV_-_Health_and_Safety_Policy_-_revised_20191227.docx</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Rainwater_tanks_for_cottages_-_revised_Jan_2018.doc">Rainwater_tanks_for_cottages_-_revised_Jan_2018.doc</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Refurbishment_-_2020-01-30.docx">Refurbishment_-_2020-01-30.docx</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Rental_-_revised_Oct_2017__.doc">Rental_-_revised_Oct_2017__.doc</a></li>';
     echo '<li><a href="../assets/docs/digital_signature_acceptance_policy.docx">digital_signature_acceptance</a></li>';
     echo '<li><a href="../assets/docs/Settlers_Park-PPM_HR_Drug_and_Alcohol_Policy.pdf">Settlers_Park-PPM_HR_Drug_and_Alcohol_Policy.pdf</a></li>';
     echo '<li><a href="../assets/docs/Admission_Policy_2019.docx">Admission_Policy_2019.docx</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Management_Handover_-_revised_20191130.docx">SPRV_-_Management_Handover_-_revised_20191130.docx</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Downscaling_-_revised_Oct_2017.docx">Downscaling_-_revised_Oct_2017.docx</a></li>';
     echo '<li><a href="../assets/docs/acquisition_assessment_policy.docx">acquisition_assessment</a></li>';
     echo '<li><a href="../assets/docs/database_credentials_policy.docx">database_credentials</a></li>';
     echo '<li><a href="../assets/docs/remote_access_policy.docx">remote_access</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Rental_-_revised_Oct_2017__.docx">Rental_-_revised_Oct_2017__.docx</a></li>';
     echo '<li><a href="../assets/docs/router_and_switch_security_policy.docx">router_and_switch_security</a></li>';
     echo '<li><a href="../assets/docs/server_audit_policy.docx">server_audit</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Policy_-_SPA_Trust_-_revised_Oct_2017.doc">SPA_Trust_-_revised_Oct_2017.doc</a></li>';
     echo '<li><a href="../assets/docs/dmz_lab_security_policy.docx">dmz_lab_security</a></li>';
     echo '<li><a href="../assets/docs/information_logging_standard.docx">information_logging_standard.docx</a></li>';
     echo '<li><a href="../assets/docs/Health_and_Safety_-_standards_and_templates_201907.docx">Health_and_Safety_-_standards_and_templates_201907.docx</a></li>';
     echo '<li><a href="../assets/docs/employee_internet_use_monitoring_and_filtering_policy.docx">employee_internet_use_monitoring_and_filtering</a></li>';
     echo '<li><a href="../assets/docs/Sexual_Harassment_Policy_202007.pdf">Sexual_Harassment_Policy_202007.pdf</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Vacating_of_Cottages_-_revised_20191113_-_Changes3.docx">SPRV_-_Vacating_of_Cottages_-_revised_20191113_-_Changes3.docx</a></li>';
     echo '<li><a href="../assets/docs/ethics_policy.docx">ethics</a></li>';
     echo '<li><a href="../assets/docs/end_user_encryption_key_protection_policy.docx">end_user_encryption_key_protection</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_policy_template.docx">SPRV_-_policy_template.docx</a></li>';
     echo '<li><a href="../assets/docs/server_malware_protection_policy.docx">server_malware_protection</a></li>';
     echo '<li><a href="../assets/docs/SPRV_-_Policy_-_Company_Vehicle_policy_-_Jan_2018.docx">Company_Vehicle_policy_-_Jan_2018.docx</a></li>';
     echo '<li><a href="../assets/docs/Settlers_Park-PPM_HR_Health,_Safety_and_Security.pdf">Settlers_Park-PPM_HR_Health,_Safety_and_Security.pdf</a></li>';
     echo '<li><a href="../assets/docs/Management_Handover_-_revised_20191130.pdf">Management_Handover_-_revised_20191130.pdf</a></li>';
     echo '<li><a href="../assets/docs/acceptable_use_policy.docx">acceptable_use</a></li>';
     echo '<li><a href="../assets/docs/password_protection_policy.docx">password_protection</a></li>';
     echo '<li><a href="../assets/docs/Training_Notes_-_SPA_standards_and_templates_-_01_07_2019.pdf">Training_Notes_-_SPA_standards_and_templates_-_01_07_2019.pdf</a></li>';
     echo '<li><a href="../assets/docs/Cybersecurity-Plan_Paper_FINAL_July-2019.pdf">Cybersecurity-Plan_Paper_FINAL_July-2019.pdf</a></li>';
     echo '<li><a href="../assets/docs/extranet_policy.docx">extranet</a></li>';
     echo '<li><a href="../assets/docs/mobile_device_encryption_policy.docx">mobile_device_encryption</a></li>';
    echo '</ol>';
}
?>
<br/>
<p>For any queries about the Policies and Procedures, please contact the General Manager.</p>
</div>
