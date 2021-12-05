</head>
<?php
/**
 * Program: body.php
 * 
 * Display the start of the body
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
?>
  <body>
    <div class="w3-container">
      <div id="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <td align="center" bgcolor="#5d8eb6" valign="top">
                <h2><font color="white">
<?php echo CLIENT_NAME . " : " . SYSTEM_NAME ?></font></h2>
            </td>
          </tr>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <td align="left" width="50%">User: 
                <?php echo $_SESSION["user_surname"] . ", ";
                echo $_SESSION["user_first_name"]; ?></td>
            <td align="right" width="50%">Timestamp: 
                <?php echo date("Y-m-d H:i:s T"); ?></td>
          </tr>
        </table>
      </div>
