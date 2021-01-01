<?php

include ("index.html");

    if(isset($_POST['submit'])){
//sends email to Robinson Farms
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$cowsSelected=$_POST['cowsSelected'];
$commentsBox=$_POST['commentsBox'];

$msg= $fname;
$msg.=" ";
$msg.=$lname;
$msg.=" requests information on ";
$msg.=$cowsSelected;

$msg.= "The return email is ";
$msg.=$email;
$msg.=" and the return phone number is ";
$msg.=$phone;
$msg.=".  They also left a comment stating:";
$msg.=$commentsBox;

$to="Ryanrobinson11111@gmail.com";
$subject="Robinson Farms Message";
$message=$msg;
$headers="From: RobinsonFarms.com";
if(mail($to, $subject, $message, $headers)){
    
    echo '<h1>Sent Successfully.  You should receive a confirmation message to the email you sent.  We will process your request and get back with you as soon as possible.  If you need to contact us immediately feel free to call us at 501-580-3461</h1><br>';
    echo '<button><a href="buyCows1.php">Return to Cow Selection</a href></button>';
}
else{
    echo "Message was not able to be sent to your email.  Please try again in a moment or give us a call directly at 501-580-3461.<br>";
    echo '<button><a href="email.php">Back</a href></button>';
}
//sends email to customer
$to=$email;
$subject="Request Confirmation From Robinson Farms";
$message="Thank you for requesting information on our cattle at Robinson Farms.  An email has been sent to a representative of the company and they will contact you with further information, generally within 24 hours.";
$headers="From: RobinsonFarms.com";

if(mail($to, $subject, $message, $headers)){
    
    echo '<h1>Email to Robinson Farms sent successfully</h1>';
    echo '<button><a href="buyCows1.php">Return to Cow Selection</a href></button>';
    
}
else{
    echo "Message was not able to be sent to Robinson Farms email.  Please try again in a moment or give us a call directly at 501-580-3461.<br>";
    echo '<button><a href="email.php">Back</a href></button>';
}

    }


?>