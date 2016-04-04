<?php
die("Thank you for your inquiry.");
$name=$_POST['name'];
$subject=$_POST['subject'];
$phone=$_POST['phone'];
$message=$_POST['message'];
$email=$_POST['email'];
$date=$_POST['date'];
$time=$_POST['time'];
$no_guests=$_POST['no_guests'];
$food_required=$_POST['food_required'];
$function_type=$_POST['function_type'];
sleep(2);
//james@royalderbyhotel.com.au
$email_to="kane@royalderbyhotel.com.au";
$email_to="dean@bonntech.com.au";
if(mail($email_to,$subject,"Name: $name\nPhone: $phone\nEmail: $email\nDate: $date\nTime: $time\nNo. of Guests: $no_guests\nFood Required: $food_required\nFunction Type: $function_type\nMessage: $message"))
	echo "1";
