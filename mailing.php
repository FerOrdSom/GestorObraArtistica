<?php
$to_email = "fordsom@gmail.com";
$subject = "Test email from my artistic manager";
$body = "Hi, This is a welcome mail sent from Localhost Using Gmail ";
$headers = "From: sender email";

if (mail($to_email, $subject, $body, $headers))

{
    echo "Email successfully sent to $to_email...";
}

else

{
    echo "Email sending failed!";
}
?>
