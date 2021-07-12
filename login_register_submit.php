<?php

include("constant.inc.php");
include("function.inc.php");
include("database.inc.php");



// $name = get_safe_value($_POST['name']);
// $email = get_safe_value($_POST['email']);
// $subject = get_safe_value($_POST['subject']);
// $number = get_safe_value($_POST['mobile']);
// $message = get_safe_value($_POST['message']);
// $added_on = date('d-m-y H:i:s');


 
$name=get_safe_value($_POST['user-name']);
$email=get_safe_value($_POST['user-email']);
$mobile=get_safe_value($_POST['user-mobile']);
$password=get_safe_value($_POST['user-password']);
$type=get_safe_value($_POST['type']);
$added_on=date('y-m-d');

if($type=="register"){
    $check =mysqli_num_rows(mysqli_query($con, "select * from user where email='$email'"));
    if($check >0){
        // email already register
        $arr = array('status'=>'error','msg'=>'email already register','field'=>'email_error');
       echo  json_encode($arr);
    }else{
        $sql = "INSERT INTO `user` (`name`, `email`, `mobile`, `password`, `status`, `added_on`) VALUES ('$name', '$email', '$mobile','$password', '1', '$added_on');";
        mysqli_query($con, $sql);
        echo "Thank you for Registering , verify your email";
        
    }
}

pr($_POST);
?>
