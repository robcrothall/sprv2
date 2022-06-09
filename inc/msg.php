<?php
if (!empty($message)) {
    echo '<p class="w3-sand">';
    //$message = htmlspecialchars($message); 
    $message = my_encrypt($message); 
    print $message; 
    echo '</p>';
}
 