<div id="bottom">
<br>
<?php
	if(!empty($message)) {
		$message = htmlspecialchars($message); 
		echo '<p class="w3-sand">';
		print $message; 
		echo '</p>';
	}
?>
            <div>
                Copyright &copy; 2019 - <?php echo date("Y");?> - Settlers Park Association, Horton Road, Port Alfred, South Africa<br>
                Privacy Policy can be found at: <a href="../doc/privacy_policy.html" target="_blank">Privacy Policy</a>
            </div>

		</div>
    </body>

</html>
