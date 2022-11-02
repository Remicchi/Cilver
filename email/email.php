<!DOCTYPE html>
<html>
<body>
<h1>Hello Mail</h1>

<p>My first mail test</p>

<?php
 $recipient="SickPhil@localhost";
 $subject="Test Email";
 $mail_body="Nobody is going to get this email but me.";
 $headers = 'From: root@localhost' . "\r\n" .
 	'Reply-To: root@localhost' . "\r\n" .
 	'X-Mailer: PHP/' . phpversion();
 mail($recipient, $subject, $mail_body, $headers, '-root@localhost');
 echo ("mail sent to: ".$recipient);
 ?>
</body>
</html>