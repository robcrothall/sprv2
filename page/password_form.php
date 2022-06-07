<?php
/**
 * Program: password_form.php
 * 
 * Change a password.
 * php version 7.2.10
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id> 
 * @link     http://www.sprv.co.za
 */
?>
 <div class="container">
<p>
To change your password, you need to enter your current password, 
then your new password twice.
If your current password is correct, and the two entries of your 
new password match exactly, 
and meet complexity criteria, your password will be changed.
</p>
<p>
The new password must have at least one upper case letter, one lower case letter, 
one numeral, and one special character, and be longer than seven characters.
</p>
<form action="password.php" method="post">
    <fieldset>
        <div class="form-group">
            Current Password:<br>
            <input autofocus class="form-control" name="old_pwd" type="password"/>
        </div>
        <div class="form-group">
            New password:<br>
            <input class="form-control" name="new_pwd1" type="password"/>
        </div>
        <div class="form-group">
            New password again:<br>
            <input class="form-control" name="new_pwd2" type="password"/>
        </div>
        <div class="form-group">
            <button type="submit" class="w3-button w3-green">Change Password</button>
        </div>
    </fieldset>
</form>
<br/>
</div>
