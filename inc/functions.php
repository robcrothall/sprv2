<?php

/**
 * functions.php
 *
 * Helper functions.
 */

require_once "../inc/constants.php";

/**
 * formatDate
 */
function formatDate($val) {
    $tmp = explode(' ', $val);
    //    var_dump($tmp);
    $arr = explode('-', $tmp[0]);
    return date('Y-m-d', mktime(0, 0, 0, $arr[1], $arr[2], $arr[0]));
}
/**
 * Check Department
 */
function check_dept($requested) {
    $rows = query("select id from groups where group_name = ?", $requested);
    if (count($rows) == 0) {
         return false;
    }
    if (!empty($rows[0]["id"])) {
        $my_dept_id = $rows[0]["id"];
    } else {
        $my_dept_id = 0; 
        return false;   
    }
    $sql = "select a.id from users a ";
    $sql .= "where a.id = " . $_SESSION["id"];
    $sql .= " and a.people_id in ";
    $sql .= "(select people_id from memberships where group_id = " . $my_dept_id . ")";
    $rows = query($sql);
    if (count($rows) > 0) {
         return true; 
    } else {
         return false;
    }
}
/**
 * Set up and check Role
 */
function check_role($requested) {
    $rows = query("select id from roles where role_name = ?", $requested);
    if (count($rows) == 0) {
        $sql = "insert into roles (role_name, role_days) values ('" . $requested . "', 365);";
        $rows = query($sql);
        $rows = query("select id from roles where role_name = ?", $requested);
    }
    if (!empty($rows[0]["id"])) {
         $my_role_id = $rows[0]["id"];
    } else {
        $my_role_id = 0;    
    }
    $sql = "select * from user_roles where user_id = " . $_SESSION["id"] . " and role_id = " . $my_role_id . " and expiry > CURDATE()";
    $rows = query($sql);
    if (count($rows) == 1) {
        return true; 
    } else {
        return false;
    }
}
/**
 * Check and clean up data input
 */
function test_input($data) 
{
    if (!empty($data)) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data,ENT_QUOTES);
    } else {
        $data = '';
    }
    return $data;
}
function test_email($email) 
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;    // the email address is syntactically valid
    } else {
        return false;    // the email address is invalid
    }
}
function test_url($url) 
{
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
        return false;    // the URL is not valid
    } else {
        return true;    // yjr URL is valid
    }
} 
/**
 * Apologizes to user with message.
 */
function apologize($message)
{
    render("../page/apology.php", ["message" => $message]);
    exit;
}

function my_encrypt($simple_string) {
// Store the cipher method
$ciphering = CIPHERING;

// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

// Non-NULL Initialization Vector for encryption
$encryption_iv = ENCRYPTION_IV;

// Store the encryption key
$encryption_key = ENCRYPTION_KEY;

// Use openssl_encrypt() function to encrypt the data
$encryption = openssl_encrypt($simple_string, $ciphering,
			$encryption_key, $options, $encryption_iv);

// Display the encrypted string
return $encryption;
}
function my_decrypt($encryption) {
    // Store the cipher method
    $ciphering = CIPHERING;

    // Use OpenSSl Encryption method
    //$iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;

    // Non-NULL Initialization Vector for decryption
    $decryption_iv = ENCRYPTION_IV;

    // Store the decryption key
    $decryption_key = ENCRYPTION_KEY;

    // Use openssl_decrypt() function to decrypt the data
    $decryption=openssl_decrypt ($encryption, $ciphering,
	$decryption_key, $options, $decryption_iv);
    return $decryption;
}

/**
 * Facilitates debugging by dumping contents of variable
 * to browser.
 */
function dump($variable)
{
    include "../page/dump.php";
    //exit;
}

    /**
     * Validates dates entered
     */
function validateDate($date, $format = 'Y-m-d')
{
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
}
/**
 * Logs out current user, if any.  Based on Example #1 at
 * http://us.php.net/manual/en/function.session-destroy.php.
 */
function logout()
{
    // unset any session variables
    $_SESSION = [];

    // expire cookie
    if (!empty($_COOKIE[session_name()])) {
        setcookie(session_name(), "", time() - 42000);
    }

    // destroy session
    session_destroy();
}

     /**
      * extract the actual SQL query submitted.
      */
function showQuery($query, $params) 
{
    $keys = array();
    $values = array();
    
    // build a regular expression for each parameter
    foreach ($params as $key=>$value) {
        if (is_string($key)) {
            $keys[] = '/:'.$key.'/';
        } else {
            $keys[] = '/[?]/';
        }
        
        if (is_numeric($value)) {
            $values[] = intval($value);
        } else {
            $values[] = '"'.$value .'"';
        }
    }
    
    $query = preg_replace($keys, $values, $query, 1, $count);
    //logit($query, $_SESSION["module"]);
    return false;
}

/**
 * Executes SQL statement, possibly with parameters, returning
 * an array of all rows in result set or false on (non-fatal) error.
 */
function query(/* $sql [, ... ] */)
{
    // SQL statement
    $sql = func_get_arg(0);
    //var_dump("175");
    // parameters, if any
    $parameters = array_slice(func_get_args(), 1);
    // try to connect to database
    static $handle;
    if (!isset($handle)) {
        try
        {
            // connect to database
            //print_r("mysql:dbname=" . DATABASE . ";host=" . SERVER);
            //print_r(USERNAME);
            //print_r(PASSWORD);
            $handle = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);
            //var_dump("188");
            // ensure that PDO::prepare returns false when passed invalid SQL
            $handle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
        }
        catch (Exception $e)
        {
            // trigger (big, orange) error
            trigger_error($e->getMessage(), E_USER_ERROR);
            exit;
        }
    }
          //logit($fullsql,$_SESSION["module"]);
    // prepare SQL statement
    $statement = $handle->prepare($sql);
    //var_dump("203", $statement);
    if ($statement === false) {
        // trigger (big, orange) error
        //$_SESSION["sql_error"] = $handle->errorInfo();
        //var_dump("207", $_SESSION["sql_error"]);
        trigger_error($handle->errorInfo()[2], E_USER_ERROR);
        exit;
    }
    // execute SQL statement
    $results = $statement->execute($parameters);
    //    $_SESSION["sql_error"] = $handle->error;
    //    $_SESSION["sql_error0"] = $handle->errorInfo()[0];
    //    $_SESSION["sql_error1"] = $handle->errorInfo()[1];
    //    $_SESSION["sql_error2"] = $handle->errorInfo()[2];
    $_SESSION["inserted_row_id"] = $handle->lastInsertId();
    //var_dump("218", $_SESSION["inserted_row_id"]);
    // return result set's rows, if any
    if ($results !== false) {
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

/**
 * Redirects user to destination, which can be
 * a URL or a relative path on the local host.
 *
 * Because this function outputs an HTTP header, it
 * must be called before caller outputs any HTML.
 */
function redirect($destination)
{
    // handle URL
    if (preg_match("/^https?:\/\//", $destination)) {
        header("Location: " . $destination);
    } else if (preg_match("/^\//", $destination)) {  // handle absolute path
        $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
        $host = $_SERVER["HTTP_HOST"];
        header("Location: $protocol://$host$destination");
    } else {    // handle relative path
        // adapted from http://www.php.net/header
        $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
        $host = $_SERVER["HTTP_HOST"];
        $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
        header("Location: $protocol://$host$path/$destination");
    }

    // exit immediately since we're redirecting anyway
    exit;
}

/**
 * Renders template, passing in values.
 */
function render($template, $values = [])
{
    // if template exists, render it
    //print_r($template);
    if (file_exists("$template")) {
        // extract variables into local scope
        extract($values);

        // render header
        include "../inc/header.php";

        // render template
        include "$template";

        // render footer
        include "../inc/footer.php";
    } else {     // else err
        trigger_error("Invalid template: $template", E_USER_ERROR);
    }
}
function logit($cmd, $module)
{
    $mycmd = str_replace("'", "`", $cmd);
    $sql = "insert into sql_log (cmd, module) values ('" . $mycmd . "', '" . $module . "')";
    $result = query("$sql");
    return $result;
}
function log_search($values = [])
{
      extract($values);
    $cmd1 = "insert into search_log (";
    $cmd2 = ") values (";
    $cmd3 = ")";
    $user_rows = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);

    $cmd1 = $cmd1 . "user_name";
    $cmd2 = $cmd2 . "'" . $user_rows[0]["username"] . "'";
    
    $cmd1 = $cmd1 . ", user_id";
    $cmd2 = $cmd2 . ", " . $_SESSION["id"];
    if (!empty($values["surname"])) {        
        $cmd1 = $cmd1 . ", surname";
        $cmd2 = $cmd2 . ", '" . $values["surname"] . "'";
    }
    
    if (!empty($values["first_name"])) {
        $cmd1 = $cmd1 . ", first_name";
        $cmd2 = $cmd2 . ", '" . $values["first_name"] . "'";
    }
    
    if (!empty($values["ref_no"])) {        
        $cmd1 = $cmd1 . ", ref_no";
        $cmd2 = $cmd2 . ", " . $values["ref_no"];
    }
    
    if (!empty($values["occupation"])) {        
        $cmd1 = $cmd1 . ", occupation";
        $cmd2 = $cmd2 . ", " . $values["occupation"];
    }
    
    if (!empty($values["party"])) {        
        $cmd1 = $cmd1 . ", party";
        $cmd2 = $cmd2 . ", " . $values["party"];
    }
    
    if (!empty($values["ship"])) {
        $cmd1 = $cmd1 . ", ship";
        $cmd2 = $cmd2 . ", '" . $values["ship"] . "'";
    }
    
    if (!empty($values["place"]))
    {
        $cmd1 = $cmd1 . ", place";
        $cmd2 = $cmd2 . ", '" . $values["place"] . "'";
    }
    
    $cmd = $cmd1 . $cmd2 . $cmd3;
    $result = query("$cmd");
    return $result;
}
function login_log($user_name_given, $password_given, $success)
{
    $cmd1 = "insert into logon_log (";
    $cmd2 = ") values (";
    $cmd3 = ")";
    if (!empty($user_name_given)) {        
        $cmd1 = $cmd1 . "user_name_given";
        $cmd2 = $cmd2 . "'" . $user_name_given . "'";
    }
    
    if (!empty($password_given)) {
        $cmd1 = $cmd1 . ", password_given";
        $cmd2 = $cmd2 . ", '" . $password_given . "'";
    }
    
    if (!empty($success)) {        
        $cmd1 = $cmd1 . ", success";
        $cmd2 = $cmd2 . ", " . $success;
    }
    if (!empty($_SESSION["id"])) {        
        $cmd1 = $cmd1 . ", user_id";
        $cmd2 = $cmd2 . ", " . $_SESSION["id"];
        $cmd1 = $cmd1 . ", changed";
        $cmd2 = $cmd2 . ", now()";
    }
    $cmd = $cmd1 . $cmd2 . $cmd3;
    //  $fullsql = showquery($sql, $parameters);
    //  dump($fullsql);
    $result = query("$cmd");
    return $result;
}
?>
