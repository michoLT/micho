<!DOCTYPE html>
<html lang=lt>
  <?php include "head.html"; ?>
  <body>
    <?php include "header_and_nav.html"; ?>
    <article>
      <script type="text/javascript">
        function confirmation() {
          return confirm('Are you sure you want to delete this?');
      }
      </script>
      <div class="text">
        <h1> Photos of Micho garage:</h1>
        <br>
        <?php
        include "mysqli-photos.php";
        $query = mysqli_query($con_photos,"Select * from photosimpreza ORDER BY time DESC");
        while ($row = mysqli_fetch_assoc($query)){
        ?>
        <a href="gallery/<?php echo $row['image']; ?>"><img src="gallery/<?php echo $row['image']; ?>" class="gallery-photos" target="_blank"></a>
        <?php
          if (iMEMBER){
            if (iADMIN) {
        ?>
              <form action='gallery-impreza.php' method='POST' onclick='return confirmation()'>
                <input type='submit' name='delete_photo' value='Delete photo'>
                <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
              </form><br><br>
        <?php
              if (isset($_POST['delete_photo'])){
                @extract($_POST);
                mysqli_query($con_photos,"DELETE from photosimpreza WHERE id='$id'");
                  if ($id == $row['id']) {
                    echo "you have successfully deleted photo!";
                    header("Refresh:3; url=gallery-impreza.php");
                }
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
