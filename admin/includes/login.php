<?php
$err = "";
if (isset($_POST['login'])) {

    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";
    $user = new User();
    if ($email == "" || $password == "") {
        $err .= "Bạn phải nhập thông tin đầy đủ";
    } else {
        if ($user->checkUser($email, $password)) {
            $result = $user->userid($email, $password);
            $_SESSION['admin'] = $email;
            echo "<script>document.location='index.php?page=home';</script>";
        } else {
            $err .= "Tài khoản hoặc mặt khẩu không chính xác";
        }
    }
}
?>
<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image">
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
                            <form class="user" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <?php global $err;
                                if ($err != "") { ?>
                                    <div class="alert alert-danger">
                                        <?= $err ?>
                                    </div>
                                <?php } ?>
                                <button class="btn btn-primary btn-user btn-block" name="login">Login</button>

                                <hr>
                                <a href="#" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                </a>
                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="?page=register">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
