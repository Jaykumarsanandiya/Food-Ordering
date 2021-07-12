<?php

include("header.php");

// if (isset($_POST['register-submit'])) {
//     $name = get_safe_value($_POST['user-name']);
//     $email = get_safe_value($_POST['user-email']);
//     $mobile = get_safe_value($_POST['user-mobile']);
//     $password = get_safe_value($_POST['user-password']);
//     $added_on = date('y-m-d');


//     if (mysqli_num_rows(mysqli_query($con, "select * from user where email='$email'"))) {
//     } else {

//         $sql = "INSERT INTO `user` (`name`, `email`, `mobile`, `password`, `status`, `added_on`) VALUES ('$name', '$email', '$mobile','$password', '1', '$added_on');";
//         mysqli_query($con, $sql);
//         echo "Thank you for Registering , verify your email";
//     }
// }


?>


<div class="login-register-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">
                                        <input type="text" name="user-name" placeholder="Username">
                                        <input type="password" name="user-password" placeholder="Password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span>Login</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane">





                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form id="frmRegister" method="post">
                                        <input type="text" name="user-name" placeholder="Username" required>
                                        <input type="password" name="user-password" placeholder="Password" required>
                                        <input name="user-email" placeholder="Email" type="email" required>
                                        <div id="email_error">asd</div>
                                        <input type="number" name="user-mobile" placeholder="Phone Number" required>
                                        <div class="button-box">
                                            <button type="submit" id="register_submit" >Register</button>
                                        </div>
                                        <input type="hidden" name="type" value="register">
                                    </form>
                                </div>
                            </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

include("footer.php");
?>