<?php
if (!empty($message)) {
    echo '<p class="w3-sand">';
    $message = htmlspecialchars($message); 
    print $message; 
    echo '</p>';
}
