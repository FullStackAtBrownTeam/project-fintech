<?php
 
if($_POST) {
    $name = "";
    $email = "";
    $reasonforcontact = "";
    $message = "";
     
    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
     
    if($reasonforcontact == "Event Partnership") {
        $reasonforcontact = "Event Partnership";
    } 
    else if($reasonforcontact == "Joining the Club") {
        $reasonforcontact = "Joining the Club";
    } 
    else if($reasonforcontact == "Alumni") {
        $reasonforcontact = "Alumni";
    } 
    else if($reasonforcontact == "Speaker") {
        $reasonforcontact = "Speaker";
    } 
     
    if(isset($_POST['message'])) {
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    }
     
    #change to fintech@brown.edu
    $recipient = "kota_soda@brown.edu";
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";

    mail($recipient, "Contact Form Response", $message);
    
    
     
} else {
    echo '<p>Something went wrong</p>';
}
 
?>