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
  if (isset ($_POST['log-in'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query = mysqli_query($con,"SELECT username FROM users WHERE username='".$username."' and password='".$password."'");
  }

    if (mysqli_num_rows($query) > 0)
    {
      $_SESSION["logged_in"] = true;
      $_SESSION["naam"] = $username;
      echo "You have succesfully log in, $username!";
    } else {
        echo "Invalid username or password!";
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
