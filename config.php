<?php
include ("mysqli-users.php");

if (!isset ($_COOKIE['id'])) {
  setcookie("id"."0", (time()+3600));
}
define ("iMEMBER", (isset($_COOKIE['id']) && $_COOKIE['id']>0 ? 1 : 0));

if (iMEMBER) {
  $query = mysqli_query($con, "SELECT * from users WHERE id ='".$_COOKIE['id']."'");

  $userData = mysqli_fetch_assoc($query);
  //$userName_id = (isset($_GET['userName_id']) ? $_GET['userName_id'] : "");
  define("iADMIN", ($userData['user_type'] == 2 ? 1 : 0));
}

?>
