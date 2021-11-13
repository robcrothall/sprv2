<?php
static $handle;
if (!isset($handle)) {
   try {
       //$handle = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);
       // ensure that PDO::prepare returns false when passed invalid SQL
       //                $handle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
       $handle = mysqli_connect(SERVER,USERNAME,PASSWORD,DATABASE)
           or die("Unable to connect to database - please call support");
       }
   catch (Exception $e)
       {
       trigger_error($e->getMessage(), E_USER_ERROR);
       exit;
       }
}
