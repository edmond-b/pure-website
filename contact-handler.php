<?php
$errors = '';
$myemail = 'edmond.b@hotmail.co.uk';
if(empty($_POST['name']) ||
empty($_POST['e-mail']) ||
empty($_POST['content'])) {
  $errors .= "\n Error: all fields are required";
}

$name = $_POST['name'];
$email_address = $_POST['e-mail'];
$message = $_POST['content'];

if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address)) {
  $errors .= "\n Error: Invalid e-mail address";
}

if(empty($errors)) {
  $to = $myemail;
  $email_subject = "Contact form submission: $name";
  $email_body = "New Message.".
  "Details: \n Name: $name \n".
  "E-mail: $email_address\n Message: \n $message";
  $headers = "From: $myemail\n";
  $headers .= "Reply-To: $email_address";
  mail($to,$email_subject,$email_body,$headers);
  header('Location: contact-thank-you.html');
}
?>
