<?php

$con_photos = mysqli_connect("localhost","root","","photos");

if(!$con_photos)
{
 die ("connection failed" .mysqli_connect_error());
}
?>
