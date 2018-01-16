<?php
// create short variable names
$name=$_POST['name'];
$college=$_POST['college'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
if (!get_magic_quotes_gpc()) {
$name = addslashes($name);
$college = addslashes($college);
$contact= addslashes($contact);
$email = addslashes($email);
$subject= addslashes($subject);
$message = addslashes($message);
}
@ $db = new mysqli("localhost","username","password","database name");
if (mysqli_connect_errno()) {
exit;
}
$query = "insert into contact values
('".$name."', '".$college."', '".$contact."', '".$email."', '".$subject."' , '".$message."')";
$result = $db->query($query);
$db->close();
$mailto="$email";  //Enter recipient email address here

$subject1 = "Shauryotsava 2k17";

$headers = "From:info@ietshauryotsava.in \r\n";
$header .= "Cc:shauryotsava@gmail.com \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";          //Your valid email address here

$message1 = "<html><head><title>Thank You for Contacting Us!!</title></head><body>";
$message1 .= "<h1>Shauryotsava 2k17</h1></br>";
$message1 .= '<img style="text-align:center;" src="http://ietshauryotsava.in/images/email.png" alt="Shauryotsava2k17" />';
$message1 .= "<p><strong>Hello </strong><strong>" . strip_tags($name) . "</strong></p></br>";
$message1 .= "<p>Your Query details are as follows:-</p></br>";
$message1 .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message1 .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($name) . "</td></tr>";
$message1 .= "<tr><td><strong>College:</strong> </td><td>" . strip_tags($college) . "</td></tr>";
$message1 .= "<tr><td><strong>Subject:</strong> </td><td>" . strip_tags($subject) . "</td></tr>";
$message1 .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($message) . "</td></tr>";
$message1 .= "</table>";
$message1 .= "<p>Your queries are being reviewed.</p></br>";
$message1 .= "<p>Thanks for contacting us!!</p></br>";
$message1 .= "<p><strong>@Shauryotsava2k17 Web Team</strong></p></br>";
$message1 .= "</body></html>";

mail($mailto,$subject1,$message1,$headers);
if($result)
{
	header('Location: http://ietshauryotsava.in/thanks.html');
	exit;
}

