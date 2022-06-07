<h2>Record a new Person</h2>

<form action="../page/people_create.php" method="post">
    <table class='w3-table-all' width="100%">
        <tr>
            <td align="right" valign="top">Surname</td>
            <td><input type='text' name='surname' class='form-control'></td>
        </tr>
        <tr>
        	<td align="right" valign="top">First name</td>
            <td><input type='text' name='first_name' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Other names</td>
            <td><input type='text' name='other_name' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Given name</td>
            <td><input type='text' name='given_name' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Title</td>
            <td><input type='text' name='title' class='form-control'></td>
        </tr> 
        <tr>
        	<td>Marital status</td>
            <td>
		  		<select name="marital_status">
	  				<?php
	  				    $marital_stat = ["D","M","S","W"];
	  				    foreach ($marital_stat as $stat)
	  				    {
	  				        if ($marital_status == $stat)
	  				        {
	  				            $selected = " selected";
	  				        }
	  				        else {$selected = "";}
	  				        echo "<option value=$stat $selected>$stat</option>";
	  				    }
	  				?>
		  		</select>
            </td>
        </tr> 
        <tr>
        	<td align="right" valign="top">ID number</td>
            <td><input type='text' name='id_no' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Birth date</td>
            <td><input type='date' name='birth_date' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Home phone</td>
            <td><input type='tel' name='home_phone' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Work phone</td>
            <td><input type='tel' name='work_phone' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Mobile phone</td>
            <td><input type='tel' name='mobile_phone' class='form-control'></td>
        </tr> 
        <tr>
        	<td>WhatsApp</td>
            <td>
		  		<select name="whatsapp">
	  				<?php
	  				    $whatsapp_stat = ["?","Y","N"];
	  				    foreach ($whatsapp_stat as $wstat)
	  				    {
	  				        if ($whatsapp == $wstat)
	  				        {
	  				            $selected = " selected";
	  				        }
	  				        else {$selected = "";}
	  				        echo "<option value=$wstat $selected>$wstat</option>";
	  				    }
	  				?>
		  		</select>
            </td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Home email</td>
            <td><input type='email' name='home_email' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Work email</td>
            <td><input type='email' name='work_email' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Sex</td>
            <td><input type='text' name='sex' class='form-control'></td>
        </tr> 
        <tr>
        	<td>Sex</td>
            <td>
		  		<select name="sex">
	  				<?php
	  				    $sex_stat = ["?","F","M"];
	  				    foreach ($sex_stat as $sstat)
	  				    {
	  				        if ($sex == $sstat)
	  				        {
	  				            $selected = " selected";
	  				        }
	  				        else {$selected = "";}
	  				        echo "<option value=$sstat $selected>$sstat</option>";
	  				    }
	  				?>
		  		</select>
            </td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Passport number</td>
            <td><input type='text' name='passport_no' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Passport expiry</td>
            <td><input type='date' name='passport_expiry' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Driver's license</td>
            <td><input type='text' name='driver_lic' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Driver's license expiry</td>
            <td><input type='date' name='driver_expiry' class='form-control'></td>
        </tr> 
	    <tr>
			<td align="right" valign="top">Company</td>
			<td>
		  		<select name="company_id">
		  			<?php
		  				$rows = query("SELECT * FROM `company` order by co_name");
		  				foreach ($rows as $row) {
							if ($row['id'] == 0)
		  					{$selected = " selected";}
		  					else {$selected = "";}
		    				echo "<option value=" . $row['id'] . $selected . ">" . $row['co_name'] . "</option>";
		    			}
		  			?>
		  		</select>
			</td>
	    </tr>
        <tr>
        	<td align="right" valign="top">Cottage</td>
            <td><input type='text' name='cottage' class='form-control'></td>
        </tr> 
	    <tr>
			<td align="right" valign="top">Occupation</td>
			<td>
		  		<select name="occupation_id">
		  			<?php
		  				$rows = query("SELECT * FROM `occupation` order by occupation");
		  				foreach ($rows as $row) {
		  					if ($_SESSION["occupation_id_select"] == $row['id'])
		  					{$selected = " selected";}
		  					else {$selected = "";}
		    				echo "<option value=" . $row['id'] . $selected . ">" . $row['occupation'] . "</option>";
		    			}
		  			?>
		  		</select>
			</td>
	    </tr>
		<tr>
			<td>R&S Representative</td>
			<td>
		  		<select name="rs_rep_id">
		  			<?php
		  				$rows = query("SELECT id, surname, first_name FROM `people` where company_id < 2 order by company_id, surname, first_name");
		  				foreach ($rows as $row) {
		  					if ($rs_rep_id == $row['id'])
		  					{$selected = " selected";}
		  					else {$selected = "";}
							if ($row['first_name'] == '')
		    				{echo "<option value=" . $row['id'] . $selected . ">" . $row['surname'] . "</option>";}
		    				else 
							{echo "<option value=" . $row['id'] . $selected . ">" . $row['surname'] . ", " . $row['first_name'] . "</option>";}
		    			}
		  			?>
		  		</select>
			</td>
	    </tr>
        <tr>
            <td align="right" valign="top" width="20%">Notes on this person</td>
            <td><textarea name='notes' class='form-control' rows="4" cols="50"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='w3-button w3-green' />
                <a href='../page/search.php' class='w3-button w3-green'>Back to Search</a>
            </td>
        </tr>
    </table>
</form>


