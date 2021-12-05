<?php
/**
 * Program: pdo_open.php
 * 
 * Open the database.
 * PHP version 7.1
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */
static $pdo;
if (!isset($pdo)) {
    try
    {
        $pdo = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // ensure that PDO::prepare returns false when passed invalid SQL
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        trigger_error($e->getMessage(), E_USER_ERROR);
        exit;
    }
}
