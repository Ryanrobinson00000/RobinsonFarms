<?php

//include ("index.html");
//performs if submission is sent from email page
    if(isset($_POST['submit'])){
//sends email to Robinson Farms
//gets first name from form
$fname=$_POST['fname'];
//gets last name from form
$lname=$_POST['lname'];
//gets email from form
$email=$_POST['email'];
//gets phone number from form
$phone=$_POST['phone'];
//gets cows selected from form /is hidden
$cowsSelected=$_POST['cowsSelected'];
//gets comments made from user from form
$commentsBox=$_POST['commentsBox'];

//sets message in format firstname lastname requests information on cowsList return email and any comment they left
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
//sends email to robinson farms email
$to="Ryanrobinson11111@gmail.com";
$subject="Robinson Farms Message";
$message=$msg;
//message headers
$headers="From: RobinsonFarms.com";

//if mail is sent properly display
if(mail($to, $subject, $message, $headers)){
    
    echo '<h1>Sent Successfully.  You should receive a confirmation message to the email you sent.  We will process your request and get back with you as soon as possible.  If you need to contact us immediately feel free to call us at 501-580-3461</h1><br>';
    //returns to buycows page
    echo '<button><a href="buyCows1.php">Return to Cow Selection</a href></button>';
}
else{
    //if mail is not sent properly notify user
    echo "Message was not able to be sent to your email.  Please try again in a moment or give us a call directly at 501-580-3461.<br>";
    //returns to email
    echo '<button><a href="email.php">Back</a href></button>';
}
//sends email to customer
$to=$email;
//email to customer subject
$subject="Request Confirmation From Robinson Farms";
//email to customer message
$message="Thank you for requesting information on our cattle at Robinson Farms.  An email has been sent to a representative of the company and they will contact you with further information, generally within 24 hours.";
//email to customer headers
$headers="From: RobinsonFarms.com";

//if mail is sent properly notify user of proper submisssion
if(mail($to, $subject, $message, $headers)){
    
    echo '<h1>Email to Robinson Farms sent successfully</h1>';
    echo '<button><a href="buyCows1.php">Return to Cow Selection</a href></button>';
    
}
//if a problem occurs notify user
else{
    echo "Message was not able to be sent to Robinson Farms email.  Please try again in a moment or give us a call directly at 501-580-3461.<br>";
    echo '<button><a href="email.php">Back</a href></button>';
}

    }


?>