<?php
/**
 * Program: db_open.php
 * 
 * Open a database connection.
 *  
 * PHP version 7.1
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */
static $handle;
if (!isset($handle)) {
    try {
        $handle = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE)
            or die("Unable to connect to database - please call support");
    }
    catch (Exception $e) {
        trigger_error($e->getMessage(), E_USER_ERROR);
        exit;
    }
}
// --------------------------------------------------

//$servername = "localhost";
//$databasename = "afpxyykk_sprv_v1";
//$username = "afpxyykk_proxy";
//$password = "RippleFrenchTaskedRef82";

// Create connection
//$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
//if ($conn->connect_error) {
//  die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";

// --------------------------------------------------
