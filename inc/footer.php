<div id="bottom">
<br>
<?php
/**
 * Program: footer.php
 * 
 * Footer of all web pages
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
if (!empty($message)) {
    $message = htmlspecialchars($message); 
    echo '<p class="w3-sand">';
    print $message; 
    echo '</p>';
}
?>
<div>
Copyright &copy; 2019 - <?php echo date("Y") . ": " . COPYRIGHT;?><br>
Privacy Policy can be found at: 
<a href="../doc/privacy_policy.html" target="_blank">Privacy Policy</a>
</div>

</div>
</body>

</html>
