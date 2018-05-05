<!DOCTYPE html>
<html lang=lt>
  <?php include "head.html"; ?>
  <body>
    <?php include "header_and_nav.html"; ?>
    <article>
      <div class="text">
        <?php
          if (iMEMBER) {
            if (iADMIN) {
              include "mysqli-news.php";
              include "mysqli-photos.php";
              echo "
              <form action='administration.php' method='post'>
                <input type='submit' value='Write news' name='write_news'>
              </form>
              <form action='administration.php' method='post'>
                <input type='submit' value='Upload photos' name='upload_photos'>
              </form>
              ";
              if (isset($_POST['write_news'])) {
                echo "<h1>Write news</h1><br><br>";
                echo "
                <form action='administration.php' method='post' enctype='multipart/form-data'>
                  <input name='image' type='file' class='input-administration' placeholder='upload image'><br>
                  <input name='title' class='input-administration' placeholder='title'><br>
                  <textarea name='article' class='textarea-contacts' placeholder='article' cols='52' row='7'></textarea><br>
                  <input type='submit' value='send' name='send_news'>
                </form>
                ";
              }
              if (isset($_POST['upload_photos'])) {
                echo "<h1>Upload photos</h1><br><br>";
                echo "
                <form action='administration.php' method='post'>
                  <input type='submit' value='Civic photos' name='civic_photos'>
                </form>
                <form action='administration.php' method='post'>
                  <input type='submit' value='Impreza photos' name='impreza_photos'>
                </form>
                ";
              }
              if (isset($_POST['civic_photos'])) {
                echo "<h1>Upload civic photos</h1><br><br>";
                echo "
                <form action='administration.php' method='post' enctype='multipart/form-data'>
                  <input name='image' type='file'>
                  <input type='submit' value='upload photo' name='upload_civic_photo'>
                </form>
                ";
              }
              if (isset($_POST['impreza_photos'])) {
                echo "<h1>Upload impreza photos</h1><br><br>";
                echo "
                <form action='administration.php' method='post' enctype='multipart/form-data'>
                  <input name='image' type='file'>
                  <input type='submit' value='upload photo' name='upload_impreza_photo'>
                </form>
                ";
              }
              if (isset($_POST['upload_impreza_photo'])) {
                $image=$_FILES['image']['name'];
                if ($image=="") {
                  echo "You must fill all fields!<br>
                  <button onclick=\"history.go(-1);\">Back</button>";
                } else {
                    mysqli_query($con_photos,"INSERT INTO photosimpreza (author,image,time) VALUES ('".$userData['id']."','$image','".time()."')") or die (mysqli_error($con_photos));
                    echo "new photo saved in database!<br>";
                    $target="gallery/".basename($_FILES['image']['name']);
                    if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
                      echo "Image uploaded successfully!";
                    } else {
                      echo "there was problem uploading image!";
                    }

                }
              }
              if (isset($_POST['upload_civic_photo'])) {
                $image=$_FILES['image']['name'];
                if ($image=="") {
                  echo "You must fill all fields!<br>
                  <button onclick=\"history.go(-1);\">Back</button>";
                } else {
                      mysqli_query($con_photos,"INSERT INTO photoscivic (author,image,time) VALUES ('".$userData['id']."','$image','".time()."')") or die (mysqli_error($con_photos));
                      echo "new photo saved in database!<br>";
                      $target="gallery/".basename($_FILES['image']['name']);
                      if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
                        echo "Image uploaded successfully!";
                      } else {
                        echo "there was problem uploading image!";
                        }
                }
              }
              if (isset($_POST['send_news'])){
                $image=$_FILES['image']['name'];
                $article=$_POST['article'];
                $title=$_POST['title'];

                mysqli_query($con,"INSERT INTO news (author,image,title,article,time) VALUES ('".$userData['id']."','$image','$title','$article','".time()."')") or die (mysqli_error($con));
                echo "new article saved in database!<br>";
                $target="gallery/".basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
                  echo"Image uploaded successfully!";
                } else {
                  echo"there was problem uploading image!";
                  }
              }

            }
          }
        ?>
      </div>
    </article>
    <?php include "footer.html"; ?>
  </body>
</html>
