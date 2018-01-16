<?php
if(isset($_POST['submit'])){
// create short variable names
$checkbox1=$_POST['opt'];
$name=$_POST['name'];
$designation=$_POST['designation'];
$college=$_POST['college'];
$city=$_POST['city'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
if (!get_magic_quotes_gpc()) {
$name = addslashes($name);
$designation = addslashes($designation);
$college= addslashes($college);
$city = addslashes($city);
$email= addslashes($email);
$mobile = addslashes($mobile);
}
@ $db = new mysqli("localhost","username","password","database name");
if (mysqli_connect_errno()) {
exit;
}
$chk="";
foreach($checkbox1 as $chk1)
{
	$chk .= $chk1.",";
}
$query = "insert into shaurya values
('".$name."', '".$designation."', '".$college."', '".$city."', '".$email."' , '".$mobile."' , '".$chk."')";
$result = $db->query($query);
$db->close();
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$mailto="$email";  //Enter recipient email address here

$subject1 = "Shauryotsava 2k17";


$headers = "From:info@ietshauryotsava.in \r\n";
$headers .= "Cc:shauryotsava@gmail.com \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";          //Your valid email address here

$message1 = "<html><head><title>Thank You for Registration!!</title></head><body>";
$message1 .= "<h1>Shauryotsava 2k17</h1></br>";
$message1 .= '<img style="text-align:center;" src="http://ietshauryotsava.in/images/email.png" alt="Shauryotsava2k17" />';
$message1 .= "<p><strong>Hello </strong><strong>" . strip_tags($name) . "</strong></p></br>";
$message1 .= "<p>Your details are as follows:-</p></br>";
$message1 .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message1 .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($name) . "</td></tr>";
$message1 .= "<tr><td><strong>Designation:</strong> </td><td>" . strip_tags($designation) . "</td></tr>";
$message1 .= "<tr><td><strong>College:</strong> </td><td>" . strip_tags($college) . "</td></tr>";
$message1 .= "<tr><td><strong>City:</strong> </td><td>" . strip_tags($city) . "</td></tr>";
$message1 .= "<tr><td><strong>Events:</strong> </td><td>" . strip_tags($chk) . "</td></tr>";
$message1 .= "</table>";
$message1 .= "<p>You are now registered for the following Events.</p></br>";
$message1 .= "<p>Thanks for contacting us!!</p></br>";
$message1 .= "<p><strong>@Shauryotsava2k17 Web Team</strong></p></br>";
$message1 .= "</body></html>";

mail($mailto,$subject1,$message1,$headers);
if($result)
{
	header('Location: http://ietshauryotsava.in/thanks.html');
	exit;
}
}

