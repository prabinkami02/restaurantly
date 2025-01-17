<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $date = htmlspecialchars($_POST['date']);
  $time = htmlspecialchars($_POST['time']);
  $people = htmlspecialchars($_POST['people']);
  $message = htmlspecialchars($_POST['message']);

  if (!empty($email) && !empty($message)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $receiver = "prabinj10@gmail.com"; // Replace with your email address
      $subject = "From: $name <$email>";
      $body = "Name: $name\nEmail: $email\nPhone: $phone\nDate: $date\nTime: $time\nPeople: $people\n\nMessage:\n$message\n\nRegards,\n$name";
      $sender = "From: $email";
      if (mail($receiver, $subject, $body, $sender)) {
         echo "Your message has been sent successfully!";
      } else {
         echo "Sorry, failed to send your message!";
      }
    } else {
      echo "Enter a valid email address!";
    }
  } else {
    echo "Email and message field is required!";
  }
?>