<!DOCTYPE html>
<html lang=lt>
  <?php include "head.html"; ?>
  <body>
    <?php include "header_and_nav.html"; ?>
    <article>
      <div class="text-guestbook">


<?php include("mysqli-messages.php");?>


<?php
$text=$_GET['text'];
$submit=$_GET['submit'];

If (!$submit) {
  header("location: guestbook.php");
} else {
    if (strlen($text) <2) {
      header("location: guestbook.php");
    } else {
        echo "Your search results:<b>$text</b><hr>";

        $explode_text = explode(" ", $text);
        $x= 0;

        foreach ($explode_text as $text_key) {
          $query= mysqli_query($con, "Select * FROM messages WHERE message LIKE '%$text_key%'  ");
          while ($row=mysqli_fetch_assoc($query)) {
            $x++;
            echo "
              <b>".$row['Author'].":</b> ".str_replace("$text_key", "<b>$text_key</b>", $row['Message'])."<br>
              <i>[".date("Y-m-d H:i:s", $row['Data'])."]</i><hr>
            ";

          }
        }
        echo "find results: $x";
    }

}
mysqli_close($con);

?>
        <button class="guestbook-search" onclick="history.go(-1);">Back</button>
      </div>
    </article>
    <?php include "footer.html"; ?>
  </body>
</html>
