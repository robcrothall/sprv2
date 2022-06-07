<?php
/**
 * Program: contact
 * 
 * Send an email to Info
 * php version 7.2.10
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id> 
 * @link     http://www.sprv.co.za
 */

// configuration
require "../inc/config.php";
    
// if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate submission
    if (isset($_POST['name'])) {
        $name = test_input($_POST['name']);
    }
    if (isset($_POST['email'])) {
        $email = test_input($_POST['email']);
    }
    if (isset($_POST['message'])) {
        $message = test_input($_POST['message']);
    }
    if (isset($_POST['subject'])) {
        $subject = test_input($_POST['subject']);
    }
    $content="From: $name \n Email: $email \n Message: $message";
    $recipient = "info@settlerspark.co.za";
    $mailheader = "From: $email \r\n";
    mail($recipient, $subject, $content, $mailheader) or die("Error sending mail!");
    echo "Email sent!";
} else {
    render("../page/contact_form.php", ["title" => "Subscribe"]);
} 
?>
