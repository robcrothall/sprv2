<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../page/logout.php">Log off</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
<!--      <li class="nav-item active">
      <li class="nav-item">
        <a class="nav-link" href="../page/logout.php">Settlers Park</a>
      </li>
-->
      <li class="nav-item">
			<?php
				if($_SESSION["id"] !== "0") {
            	echo '<a class="nav-link" href="../page/password.php">Password</a> ';
				}
			?>	
<!--        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>  -->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../page/register.php">Register</a>
      </li>
      <li class="nav-item">
			<?php
				if($_SESSION["id"] !== "0") {
            	echo '<a class="nav-link" href="../page/search.php">Search</a> ';
				}
			?>	
      </li>
      <li class="nav-item">
			<?php
				if($_SESSION["id"] !== "0") {
            	echo '<a class="nav-link" href="../page/policies.php">P&amp;P</a> ';
				}
			?>	
      </li>
      <?php
      if(check_role("STAFF" | check_role("ADMIN") {
      	echo '<li class="nav-item dropdown">';
        echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        echo 'Administration';
        echo '</a>';
        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        echo '<a class="dropdown-item" href="../page/occupation.php">Occupation</a>';
        echo '<a class="dropdown-item" href="../page/people.php">People</a>';
        //echo '<a class="dropdown-item" href="../page/synonyms.php">Synonyms</a>';
        echo '<div class="dropdown-divider"></div>';
        echo '<a class="dropdown-item" href="../page/password_force.php">Password force</a>';
        echo '<a class="dropdown-item" href="../page/roles.php">Roles</a>';
        //echo '<a class="dropdown-item" href="../page/users.php">Users</a>';
        if(check_role("ADMIN") {
            echo '<div class="dropdown-divider"></div>';
            //echo '<a class="dropdown-item" href="../page/history_date_fix.php">History date fix</a>';
        }
        echo '</div>';
      	echo '</li>';
   	}
      ?>
      <li class="nav-item">
        <a class="nav-link" href="../page/contact.php">Contact</a>
      </li>
    </ul>
  </div>
</nav> 
