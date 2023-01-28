<?php

    // variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $company = isset($_POST['company']) ? $_POST['company'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';
  
    // form validation
    if(!empty($email) && !empty($message)){
      // email validation
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $receiver = ""; // enter receiver email here
        $subject = "From: $name <$email>";
        $body = "Name: $name\nEmail: $email\nPhone: $phone\nCompany: $company\n\nMessage:\n$message\n\nRegards,\n$name";
        $sender = "From: $email";

        // notify users if mail has been sent
        if(mail($receiver, $subject, $body, $sender)){
           echo "Your message has been sent.";
        }else{
           echo "Sorry, failed to send your message.";
        }
      }else{
        echo "Please enter a valid email address.";
      }
    }else{
      echo "Email and message field are both required!";
    }
?>