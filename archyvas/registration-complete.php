<!DOCTYPE html>
<html lang=lt>
  <?php include "head.html"; ?>
  <body>
    <?php include "header_and_nav.html"; ?>
    <article>
      <div class="text">
        <br>
<?php

include ("mysqli-users.php");
if (isset ($_POST['registration'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $password =preg_replace("[^A-Za-z0-9]","",$password);



  if ($username =="" or $password =="" or $email==""){
    echo "You must fill all fields!";
  } else {
      if($query = mysqli_query($con,"SELECT username FROM users WHERE username='".$username."'")
        and (mysqli_num_rows($query) != 0)
        )
      {
        echo "Name is already used, try another!";
      } elseif ($query = mysqli_query($con,"SELECT username FROM users WHERE email='".$email."'")
        and (mysqli_num_rows($query) != 0)
        )
      {
        echo "Email is already used, try another!";
      } else {
        mysqli_query($con,"INSERT INTO users
                (username,password,email,time) VALUES
                ('$username', '$password','$email','".time()."')
                ") or die("Error, data is not saved");

        echo "Registration completed! Now you can <a href='log-in.php'>log in</a>!";
      }
  }
}
?>
        <br>
        <br>
        <button onclick="history.go(-1);">Back</button>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
    </article>
    <?php include "footer.html"; ?>
  </body>
</html>
