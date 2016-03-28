<?php

$to = $referrals;

$subject = "I found a great service for homework and assignments help!";

$message = "<html><body>Dear " .$username . ",<br/><br/>Thank you for creating your NetSchoolZone account.<br/><br/>Please make a note of your username and password.<br/><br/><table rules='all' style='color:#333;background: #ddd; border:1px solid #ccc;' cellpadding='5'>";

$message .= "</table><br/><br/>You can login to NetSchoolZone from: <a href='http://netschoolzone.com/login.php'>Here</a><br/><br/>Sincerely,<br/>NetSchoolZone<br/></body></html>";

$from = "admin@netschoolzone.com";

$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= "From:" . $from;

mail($to, $subject, $message, $headers);

?>