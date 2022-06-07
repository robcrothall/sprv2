<?php
// phpinfo(4);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('track_errors', true);

// phpinfo(4);
         $to = "rob@crothall.co.za";
         $subject = "This is subject";
         
         $message = "<b>This is HTML message.</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:rob@crothall.co.za \r\n";
         $header .= "Cc:rob@robcrothall.co.za \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }

?>