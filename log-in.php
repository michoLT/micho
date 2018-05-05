<!DOCTYPE html>
<html lang=lt>
  <?php include "head.html"; ?>
  <body>
    <?php include "header_and_nav.html"; ?>
    <article>
      <div class="text">
        <br>
          <?php
            include("mysqli-users.php");
            if (isset ($_POST['log-in'])) {
              $username=$_POST['username'];
              $password=$_POST['password'];

              $query = mysqli_query($con,"SELECT * FROM users WHERE username='".$username."'");
              $row = mysqli_fetch_assoc($query);
              $dbUsername= strtolower($row['username']);
              $dbPassword= $row['password'];
              $username= strtolower($username);
              $password = $password;


              if ($username == $dbUsername && $password == $dbPassword) {
                setcookie("id",$row['id'],(time()+ 3600));

                header("Location: index.php");
              } else {


               echo "Invalid username or password!<br>
               <button onclick=\"history.go(-1);\">Back</button>";
              }

            mysqli_close($con);
            } else {
                echo "<h1>Log in</h1><br>";
                echo "
                <form action='log-in.php' method='POST'>
                  <input type='text' name='username' placeholder='username' /><br>
                  <input type='password' name='password' placeholder='password' /><br>
                  <input type='submit' value='Submit' name='log-in' />
                </form>
                ";
                }
         ?>
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
