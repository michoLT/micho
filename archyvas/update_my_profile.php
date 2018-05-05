<?php
include "mysqli-users.php";
if (isset($_POST['update_my_profile'])){
  @extract($_POST);
    if (strlen($password) < 4) {
      $error = "password contains minimum 5 characters";
    } else {
      $error = "your profile succesfully updated!";
      mysqli_query($con,"UPDATE users SET email='$email', password='$password' WHERE id='".$_COOKIE['id']."'");
    }
  echo "$error";


}

?>
