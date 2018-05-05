<!DOCTYPE html>
<html lang=lt>
  <?php include "head.html"; ?>
  <body>
    <?php include "header_and_nav.html"; ?>
    <article>
      <div class="text-guestbook">

<?php include("mysqli-messages.php");?>
<!--search button-->
  <div class=guestbook-search>

    <form action='search_results.php' method='GET'>
      <input type='text' name='text' placeholder='search' />
      <input type='submit' value='search' name='submit'/>
    </form>
  </div>
<!--page numbering-->
<?php
  $page = (isset ($_GET['page']) ? $_GET['page']: "1");

  $msgs_in_page = 15;

  $sel1 = "Select * from messages";
  $query1 = mysqli_query($con,$sel1);

  $all_msgs = mysqli_num_rows($query1);

  $start = ($msgs_in_page * $page) - $msgs_in_page;

  if ($all_msgs <= $msgs_in_page) {
    $num_page = 1;
  } else {
        if (($all_msgs % $msgs_in_page) == 0) {
          $num_page = $all_msgs / $msgs_in_page;
        } else {
          $num_page = $all_msgs / $msgs_in_page + 1;
        }
  }
// message display
  $sel = "Select * from messages ORDER BY data DESC LIMIT $start, $msgs_in_page";
  $query = mysqli_query($con,$sel);
  $rows = mysqli_num_rows($query);

  if ($rows > 0) {

    for ($i=0; $i<$rows; ++$i){
      $row = mysqli_fetch_assoc($query);
      echo "
      <b>".$row['Author'].":</b> ".$row['Message']."<br>
      <i>[".date("Y-m-d H:i:s", $row['Data'])."]</i><hr>
      ";
    }
  } else {
      echo "No messages.<hr>";
  }
// page display
echo "Puslapiai: ";
for ($i=1; $i<=$num_page; $i++) {
  if ($i != $page) {
    echo" <a href=\"guestbook.php?page=$i\"  >$i</a> ";

  } else {
      echo "<b>$i</b>";
  }
}
session_start();
  if (iMEMBER) {
    $_SESSION['username']=$userData['username'];
    echo "
      <br>
      <b>$userData[username]:</b><br>
      <form action='messages.php' method='post'>
        <textarea name='message' cols='52' rows='7' placeholder='text' required></textarea><br>
        <input type='submit' name='send_message_with_reg' value='Send' />
      </form>
    ";
  } else {
    echo "
      <br>
      <form action='' method='post'>
        <input type='submit' value='Send message' name='send_message_without_reg' />
      </form>
    ";
      if (isset($_POST['send_message_without_reg'])) {
        echo "you have to sign up, in oder to send a message!";
      }
  }

mysqli_close($con);

?>
      </div>
    </article>
    <?php include "footer.html"; ?>
  </body>
</html>


































































