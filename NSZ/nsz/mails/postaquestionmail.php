<?php

$to = "bhavya.vasireddy05@gmail.com";
$subject = "NETSCHOOLZONE - Question details";
$message = "<html><body>Dear " .$username . ",<br/><br/>Thank you for creating your NetSchoolZone account.<br/><br/>Please make a note of your username and password.<br/><br/><table rules='all' style='color:#333;background: #ddd; border:1px solid #ccc;' cellpadding='5'>";
$message .= "<tr style='background: #eee;border:0;'><td><strong>Subject:</strong> </td><td>" . $subject . "</td></tr>";
//$message .= "<tr style='background: #eee;border:0;'><td><strong>Email:</strong> </td><td>" . strip_tags($mailid) . "</td></tr>";
$message .= "<tr style='background: #eee;border:0;'><td><strong>Title:</strong> </td><td>" . strip_tags($title) . "</td></tr>";
$message .= "<tr style='background: #eee;border:0;'><td><strong>Question:</strong> </td><td>" . strip_tags($question) . "</td></tr>";
$message .= "</table><br/><br/>You can login to NetSchoolZone from: <a href='http://netschoolzone.com/login.php'>Here</a><br/><br/>Sincerely,<br/>NetSchoolZone<br/></body></html>";
$from = "admin@netschoolzone.com";
$headers .= "CC: mailashwinkumar@gmail.com\r\n"; 
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From:" . $from;
mail($to, $subject, $message, $headers);
?>