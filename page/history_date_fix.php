<?php
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
		$rec_start = 8000;
		$rec_end = 9001;
		$date_out = "";
		$space = "  ";		
      $rows = query("SELECT a.id, a.event_date from history a where a.id >= ? and a.id < ?", $rec_start, $rec_end);
      if (count($rows) > 0)
      {
        	foreach ($rows as $row)
      	{
				$event_date = $row['event_date'];
				$rec_id = $row['id'];
				$changed = false;
				$date_out = "";
				$date_ar = explode("-", $event_date);
				//var_dump($date_ar);
				$separator = "";
				foreach ($date_ar as $field)
				{
					if (strlen($field) > 0)
					{
						if (strlen($field) < 2) {$field = '0' . $field; $changed = true;}
						$date_out .= $separator . $field;
						$separator = "-";
					}
				}
				if ($changed)
				{
					print_r($event_date);
					print_r($space);
					print_r($date_out);
					echo "<br>";
					$event_date = trim($date_out);
         		$rows = query("update history set event_date=? where id=?",
         							$event_date, $rec_id);
					If ($rows === false)
					{
						print_r($rec_id);
						print_r($event_date);
					}
					else 
					{
						echo " ";
        			}
        			$changed = false;
    			}
			}
    	}

?>
