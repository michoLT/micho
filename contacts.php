<?php
  function sendemail($to, $from, $fromName, $body){
      $mail = new PHPmailer();
      $mail->setFrom($from, $fromName);
      $mail->addAddress($to);
      $mail->Subject = "contact From - Email";
      $mail->Body = $body;
      $mail->isHTML(false);

      return $mail->send();
  }
  $msg = "";

  if (isset ($_POST['submit'])) {
    require 'phpmailer/PHPmailerAutoload.php';
   $name = $_POST['username'];
   $email = $_POST['email'];
   $body = $_POST['body'];
    if (sendemail('mikalojus.bogdanas@gmail.com', $email, $name, $body))
      $msg = "Email sent!";
    else
      $msg = "Email failed!";

  }
?>


<!DOCTYPE html>
<html lang=lt>
  <?php include "head.html"; ?>
  <body>
    <?php include "header_and_nav.html"; ?>
    <article>
      <div class="text">
        <br>
        <img class="img-circle" src="gallery/me.jpg">
        <br>
        <a href="https://www.google.com/maps/place/Tilto+g.+7,+Vilnius+01101,+Lietuva/@54.68774,25.2839518,17z/data=!4m5!3m4!1s0x46dd9410a1d6eba7:0x6ebf70d5e71d1352!8m2!3d54.687678!4d25.2859259">View in map</a>
        <br>Tilto st. 7-3-3<br>Vilnius, Lithuania<br>Phone +37060659714.<br>
        <br>
       <h1> Contact me</h1><br>
       <form method="post" action="contacts.php">
          <input type="text" name="username" class="input-contacts" placeholder="Name" required /><br>
          <input type="email" name="email" class="input-contacts" placeholder="Email" required /><br>
          <textarea name="body" class="textarea-contacts" cols="52" rows="7" placeholder="Text" required></textarea><br>
          <input type="submit" name="submit" class="input-contacts" value="Send Email">
       </form>
        <br>
        <?php echo $msg; ?>
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
