<div class="container">
<p>
To change another User's password, you need to enter the UserName, then the new password twice.
If the UserName is found, and the two entries of the new password match exactly, 
the password will be changed.
</p>
<p>You need the ADMIN role in order to use this function.</p>
<p>When the User signs in, s/he will be asked to change the password to something else, so use a simple password on this screen.</p>
<form action="password_force.php" method="post">
    <fieldset>
        <div class="form-group">
        		User ID:<br>
            <input autofocus class="form-control" name="username" size="50" type="text"/>
        </div>
        <div class="form-group">
        		New password:<br>
            <input class="form-control" name="new_pwd1" size="50" type="password"/>
        </div>
        <div class="form-group">
        		New password again:<br>
            <input class="form-control" name="new_pwd2" size="50" type="password"/>
        </div>
        <div class="form-group">
            <button type="submit" class="w3-button w3-green">Change Password</button>
        </div>
    </fieldset>
</form>
<br/>
</div>
