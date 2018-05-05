<?php

include ("mysqli-messages.php");
session_start();
if (iMEMBER) {

  if (isset($_POST['send_message_with_reg'])){
    $name=$_SESSION['username'];
    $message = $_POST['message'];
    $massage = htmlspecialchars($message);
  }
}

  mysqli_query($con,"INSERT INTO messages
              (author, message, data) VALUES
              ('$name', '$message','".time()."')
              ") or die("Error, data is not saved");

$er = "";

 if ($er !=""){
  echo $er;
 } else {
   header("Location: guestbook.php");
 }
?>
