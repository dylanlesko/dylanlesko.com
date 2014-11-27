<?php




// The date
date_default_timezone_set('America/New_York');
$date = date('m/d/Y h:i:s a', time());





// The message
$name = $_REQUEST['name'];
$message = $_REQUEST['message'];
$email_from = $_REQUEST['email'];
$email_to = "help@dylanlesko.com";
$send_back = $email_from;

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

$name = "Name: " . $name;
$email_from = "Email: " . $email_from;
$message = "Message: " . $message;


$message2 = $date . "\r\n";
$message2 = $message2 . $name;
$message2 = $message2 . "\r\n";
$message2 = $message2 . $email_from;
$message2 = $message2 . "\r\n";
$message2 = $message2 . $message;

$message3 = "This is confirmation that the following message has been sent to Dylan Lesko. \r\n_____________________________________________________________________\r\n\r\n\r\n" . $message2;

// Send
mail($email_to, 'My Subject', $message2);
mail($send_back, 'My Subject', $message3);




header('Refresh: 5; URL=http://www.dylanlesko.com');
 Echo "<html>";
 Echo "</br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Message Sent!</b></br></br><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Redirecting you home in 5 seconds.</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=http://www.dylanlesko.com>Click Here if not automatically redicted.</a></html>";
exit;
?>