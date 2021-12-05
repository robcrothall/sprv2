<?php
/**
 * Program: birthday_form
 * 
 * Display residents birthdays and anniversaries, and staff birthdays.
 * php version 7.2.10
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id> 
 * @link     http://www.sprv.co.za
 */

    $_SESSION["module"] = $_SERVER["PHP_SELF"];
?>
<h2>Birthdays for a specific month</h2>
<form action="../ctl/birthday.php" method="post">
<?php
if (check_role("STAFF") | check_role("ADMIN") | check_role("PR")) {
    echo '<a href="../data/birthday.txt" class="w3-button w3-green" ';
    echo 'target="_blank">Download</a>&nbsp;';
}
?>
<input type='submit' value='Refresh' class='w3-button w3-green'/>
<br>
<?php
if (isset($_SESSION["mnth"])) {
    $mnth = $_SESSION["mnth"];
} else {
    $mnth = 0;
}
$c_year = $_SESSION["age_yr"];
$c_month = $_SESSION["age_mnth"];
if (file_exists("../data/birthday.txt")) {
    unlink("../data/birthday.txt");
}
$fp = fopen("../data/birthday.txt", 'w');
fwrite($fp, "Resident Birthdays for month $mnth\r\n");
?>
<label for=mnth>Month number (1 to 12):</label>
<input type="number" name="mnth" size=3 step=1 min=1 max=12 autofocus 
    value="<?php echo $mnth; ?>">
<?php 
if (check_role("STAFF") | check_role("ADMIN") | check_role("PR")) {
    echo "Age as at: " . $c_year . "-" . $c_month . "-01\n"; 
}        
?>
<table cellspacing=0 cellpadding=4>
    <caption align=bottom>Resident Birthdays, in day of month order</caption>
    <tr>
        <th>Day</th>
        <th>Name</th>
<?php
if (check_role("STAFF") | check_role("ADMIN") | check_role("PR")) {
    echo "<th>Cottage</th>\n";
    echo "<th>Birthday</th>\n";
    echo "<th>Age</th>\n";
}
?>
    </tr>
<?php
$rows = query(
    "select day(birth_date) as day, surname, first_name, given_name, " .
    "cottage, birth_date " .
    "from people where company_id=1 and status='Resident' " .
    "and bd_disclose = 'Y' " .
    "and month(birth_date) = ? and year(birth_date) > 1901 " .
    "order by day(birth_date), surname", $mnth
);
foreach ($rows as $row) {
    if (!empty($row["given_name"])) {
        $given_name = $row["given_name"];
        if ($given_name = strtoupper($given_name)) {
            $given_name = ucwords(strtolower($given_name));
        }
        $full_name = $given_name;
    } else {
        $full_name = $row["first_name"];
        if ($full_name = strtoupper($full_name)) {
            $full_name = ucwords(strtolower($full_name));
        }
    }
    $surname = $row["surname"];
    if ($surname = strtoupper($surname)) {
        $surname = ucwords(strtolower($surname));
    }
    $full_name .= " " . $surname;
    list($b_year, $b_month, $b_day) = explode('-', $row["birth_date"]);
    $b_date_int = mktime(0, 0, 0, (int)$b_month, (int)$b_day, (int)$b_year);
    $b_day = date("jS", $b_date_int);
    $date1 = new DateTime("$b_year-$b_month-$b_day");
    $date2 = $date1->diff(new DateTime("$c_year-$c_month-01"));
    $age = $date2->y;
    if ($age % 10 == 0) {
        $full_name .= " (**)";
    } elseif ($age % 5 == 0) {
        $full_name .= " (*)";
    }
    echo "<tr>\n";
    echo "<td>$b_day</td>\n";
    fwrite($fp, "$b_day\t");
    echo "<td>$full_name</td>\n";
    fwrite($fp, "$full_name\n");
    if (check_role("STAFF") | check_role("ADMIN") | check_role("PR")) {
        echo "<td>" . $row["cottage"] . "</td>\n";
        echo "<td>" . $row["birth_date"] . "</td>\n";
        echo "<td align='right'>$age</td>\n";
    }
    echo "</tr>";
}
?>
</table>
<?php
fwrite($fp, "\n\nStaff Birthdays for month $mnth\n\n");
?>
<br>
<hr>
<br>
<table cellspacing=0 cellpadding=4>
    <caption align=bottom>Staff Birthdays, in day of month order</caption>
    <tr>
        <th>Day</th>
        <th>Name</th>
<?php
if (check_role("STAFF") | check_role("ADMIN") | check_role("PR")) {
    echo "<th>Birthday</th>";
    echo "<th>Age</th>";
}
?>
    </tr>
<?php
$rows = query(
    "select day(birth_date) as day, surname, first_name, given_name, birth_date " .
    "from people where company_id=2 and status='Staff' and month(birth_date) = ? " .
    "and bd_disclose = 'Y' " .
    "order by day(birth_date), surname", $mnth
);
foreach ($rows as $row) {
    if (!empty($row["given_name"])) {
        $given_name = $row["given_name"];
        if ($given_name = strtoupper($given_name)) {
            $given_name = ucwords(strtolower($given_name));
        }
        $full_name = $given_name;
    } else {
        $full_name = $row["first_name"];
        if ($full_name = strtoupper($full_name)) {
            $full_name = ucwords(strtolower($full_name));
        }
    }
    $surname = $row["surname"];
    if ($surname = strtoupper($surname)) {
        $surname = ucwords(strtolower($surname));
    }
    $full_name .= " " . $surname;
    list($b_year, $b_month, $b_day) = explode('-', $row["birth_date"]);
    $b_date_int = mktime(0, 0, 0, (int)$b_month, (int)$b_day, (int)$b_year);
    $b_day = date("jS", $b_date_int);
    $date1 = new DateTime("$b_year-$b_month-$b_day");
    $date2 = $date1->diff(new DateTime("$c_year-$c_month-01"));
    $age = $date2->y;
    if ($age % 10 == 0) {
        $full_name .= " (**)";
    } elseif ($age % 5 == 0) {
        $full_name .= " (*)";
    }
    echo "<tr>\n";
    echo "<td>$b_day</td>\n";
    fwrite($fp, "$b_day\t");
    echo "<td>$full_name</td>\n";
    fwrite($fp, "$full_name\n");
    if (check_role("STAFF") | check_role("ADMIN") | check_role("PR")) {
        echo "<td>" . $row["birth_date"] . "</td>\n";
        echo "<td align='right'>$age</td>\n";
    }
    echo "</tr>";
}
?>
</table>
<?php
fwrite($fp, "\r\n\r\nWedding and Partner anniversaries for month $mnth\r\n\r\n");
?>
<br>
<hr>
<br>
<table cellspacing=0 cellpadding=4>
    <caption align=bottom>Wedding and Partner anniversaries, in day of month order
    </caption>
    <tr>
        <th>Day</th>
        <th>Names</th>
<?php
if (check_role("STAFF") | check_role("ADMIN") | check_role("PR")) {
    echo "<th>Anniversary</th>";
    echo "<th>Years</th>";
}
?>
    </tr>
<?php
$c_year = date("Y");
$c_month = $mnth + 1;
if ($c_month > 12) {
    $c_year += 1; 
    $c_month = $c_month % 12;
}
$asql = "select day(a.relationship_date) as day, a.relationship_date, ";
$asql .= " b.surname as p_surname, b.first_name as p_first_name, ";
$asql .= " b.given_name as p_given_name, ";
$asql .= " c.surname as r_surname, c.first_name as r_first_name, ";
$asql .= " c.given_name as r_given_name ";
$asql .= " from people_related a, people b, people c ";
$asql .= " where ";
$asql .= " a.people_id = b.id ";
$asql .= " and c.status = 'Resident' ";
$asql .= " and b.status = 'Resident' ";
$asql .= " and a.related_id = c.id ";
$asql .= " and a.relationship in ('Spouse','Partner') ";
$asql .= " and c.company_id = 1 ";
$asql .= " and b.company_id = 1 ";
$asql .= " and b.an_disclose = 'Y' ";
$asql .= " and c.an_disclose = 'Y' ";
$asql .= " and month(a.relationship_date) = " . $mnth;
$asql .= " order by day, p_surname ";
$rows = query($asql);
foreach ($rows as $row) {
    $p_first_name = "";
    $p_given_name = "";
    $p_surname    = "";
    $p_full_name  = "";
    $r_first_name = "";
    $r_given_name = "";
    $r_surname    = "";
    $r_full_name  = "";
    $full_name    = "";
    // Handle primary name
    if (!empty($row["p_given_name"])) {
        $p_given_name = $row["p_given_name"];
        if ($p_given_name = strtoupper($p_given_name)) {
            $p_given_name = ucwords(strtolower($p_given_name));
        }
        $p_first_name = $p_given_name;
    } else {
        $p_first_name = $row["p_first_name"];
        if ($p_first_name = strtoupper($p_first_name)) {
            $p_first_name = ucwords(strtolower($p_first_name));
        }
    }
    $p_surname = $row["p_surname"];
    if ($p_surname = strtoupper($p_surname)) {
        $p_surname = ucwords(strtolower($p_surname));
    }
    // Handle related name
    if (!empty($row["r_given_name"])) {
        $r_given_name = $row["r_given_name"];
        if ($r_given_name = strtoupper($r_given_name)) {
            $r_given_name = ucwords(strtolower($r_given_name));
        }
        $r_first_name = $r_given_name;
    } else {
        $r_first_name = $row["r_first_name"];
        if ($r_first_name = strtoupper($r_first_name)) {
            $r_first_name = ucwords(strtolower($r_first_name));
        }
    }
    $r_surname = $row["r_surname"];
    if ($r_surname = strtoupper($r_surname)) {
        $r_surname = ucwords(strtolower($r_surname));
    }
    // If the surnames are the same, get rid of r_surname
    if ($p_surname == $r_surname) {
        $r_surname = "";
    }
    $full_name = $r_first_name . " " . $r_surname . " & " . 
    $p_first_name . " " . $p_surname;
    // get rid of multiple spaces
    $full_name = preg_replace('/\s+/', ' ', $full_name);  
    list($b_year, $b_month, $b_day) = explode('-', $row["relationship_date"]);
    $b_date_int = mktime(0, 0, 0, (int)$b_month, (int)$b_day, (int)$b_year);
    $b_day = date("jS", $b_date_int);
    $date1 = new DateTime("$b_year-$b_month-$b_day");
    $date2 = $date1->diff(new DateTime("$c_year-$c_month-01"));
    $age = $date2->y;
    if ($age % 10 == 0) {
        $full_name .= " (**)";
    } elseif ($age % 5 == 0) {
        $full_name .= " (*)";
    }
    echo "<tr>\n";
    echo "<td>$b_day</td>\n";
    fwrite($fp, "$b_day\t");
    echo "<td>$full_name</td>\n";
    fwrite($fp, "$full_name\n");
    if (check_role("STAFF") | check_role("ADMIN") | check_role("PR")) {
        echo "<td>" . $row["relationship_date"] . "</td>\n";
        echo "<td align='right'>$age</td>\n";
    }
        echo "</tr>";
}
fclose($fp);
?>
</table>
</div>
