<?php

include("constant.inc.php");
include("function.inc.php");
include("database.inc.php");



$name = get_safe_value($_POST['name']);
$email = get_safe_value($_POST['email']);
$subject = get_safe_value($_POST['subject']);
$number = get_safe_value($_POST['mobile']);
$message = get_safe_value($_POST['message']);
$added_on = date('d-m-y H:i:s');

$sql_contact_us = "INSERT INTO `contact_us` (`name`, `email`, `subject`, `number`, `message`, `added_on`)
 VALUES ( '$name', '$email', '$subject', '$number', '$message', '$added_on')";

 mysqli_query($con,$sql_contact_us);
?>
