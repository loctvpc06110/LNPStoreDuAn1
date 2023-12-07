<?php
$err = "";
if (isset($_POST['login'])) {

    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";
    $user = new User();
    if ($email == "" || $password == "") {
        $err = "Bạn phải nhập thông tin đầy đủ";
    } else {
        $md5Password = md5($password);
        if ($user->checkUserCustomer($email, $md5Password)) {
            $result = $user->userid($email, $md5Password);

            $checkRole = $user->loginSite($email);
        
            if ($checkRole['role'] == "User"){
                if($checkRole['status'] == "Hoạt Động"){
                    $_SESSION['login_email_user'] = $email;
                echo "<script>document.location='index.php?page=home';</script>";
                }else{
                    $err = "Tài khoản của bạn đã bị khóa !";
                }
            }
            else if ($checkRole['role'] == "Admin"){
                if($checkRole['status'] == "Hoạt Động"){
                    $_SESSION['login_email_admin'] = $email;
                echo "<script>document.location='index.php?page=home';</script>";
                }else{
                    $err = "Tài khoản của bạn đã bị khóa !";
                } 
                
            }
           
        } else {
            $err = "Tài khoản hoặc mặt khẩu không chính xác"; 
        }
    }
}
?>
<section id="login">
    <div class="wrap">
        <div class="heading">
            <img src="images/logoShop.png" width="200px">
        </div>
        <form method="post">
            <div class="form-group">
                <input type="email" id="_email" name="email">
                <span>Email</span>
                <i></i>
            </div>
            <div class="form-group">
                <input type="password" id="_password" name="password">
                <span>Mật khẩu</span>
                <i></i>
            </div>
            <br>
            <div class="mb3 form-check">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Nhớ tài khoản</label>
            </div>
            <?php global $err;
            if ($err != "") { ?>
                <div class="alert alert-danger">
                    <?= $err ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <a href="?page=forgot" class="forgot_pw">Quên mật khẩu ?</a=>
            </div>

            <div class="form-group btn">
                <a href="?page=signup">Tạo tài khoản ?</a>
                <button class="normal" name="login">Đăng nhập</button>
            </div>
        </form>
    </div>
</section>