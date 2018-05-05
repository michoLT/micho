<!DOCTYPE html>
<html lang=lt>
  <?php include "head.html"; ?>
  <body>
    <?php include "header_and_nav.html"; ?>
    <article>
      <script type="text/javascript">
        function confirmation() {
          "use strict";
          return confirm('Are you sure you want to delete this?');
      }
      </script>
      <div class="text">
        <?php
          if (iMEMBER){
            include("mysqli-users.php");
              if ($userData['id'] =="") {
                echo "
                Invalid username!
                ";
              } elseif  (isset($_POST['edit_my_profile'])){
                  echo "
                    <h1> Username profile:</h1><br>
                    <form action='my-profile.php' method='POST'>
                      Username: ".$userData['username']."<br>
                      Email: <input name= 'email' value= ".$userData['email']."><br>
                      Password: <input type= 'password' name='password' value= ".$userData['password']."><br>
                      <input type='submit' name='update_my_profile' value='Update my profile' />
                    </form>
                    ";

              } elseif (isset($_POST['update_my_profile'])){
                    @extract($_POST);
                      if (strlen($password) < 5) {
                        echo" password contains minimum 5 characters<br>
                          <button onclick=\"history.go(-1);\">Back</button>";
                      } else {
                        echo "your profile succesfully updated!";
                        mysqli_query($con,"UPDATE users SET email='$email', password='$password' WHERE id='".$_COOKIE['id']."'");
                      }
              } elseif (isset($_POST['delete_my_profile'])){
                  mysqli_query($con,"DELETE from users WHERE id='".$_COOKIE['id']."'");
                  echo " you have successfully deleted your profile!";
                  header("Refresh:3; url=index.php");
                  setcookie("id","0",-1);
              } else {
                echo "
                  <h1> Username profile:</h1><br>
                  Username: ".$userData['username']."<br>
                  Email: ".$userData['email']."<br>
                  User type: ".($userData['user_type']== 1 ? "user" : "admin")."<br><br>
                ";
                echo "
                    <form action='my-profile.php' method='POST'>
                      <input type='submit' name='edit_my_profile' value='Edit my profile'>
                    </form>
                    <form action='my-profile.php' method='POST' onclick='return confirmation()'>
                      <input type='submit' name='delete_my_profile' value='Delete my profile'>
                    </form>
                ";
              }
          }
        ?>
      </div>
    </article>
    <?php include "footer.html"; ?>
  </body>
</html>
