<?php
$err = "";
if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rePassword = $_POST['rePassword'];

    if (strlen($email) < 5) {
        $err .= "Invalid email ! <br/>";
    }
    if (strlen($password) < 8) {
        $err .= "Password needs to be at least 8 characters long ! <br/>";
    }
    if ($password != $rePassword) {
        $err .= "Password & Retype Password must be the same ! <br/>";
    }

    if ($err == "") {
        $db = new User();
        if ($db->checkAccount($email)) {
            $newAcc = $db->createAccUser($email, $password);
            echo "<script>document.location='index.php?page=login';</script>";
        } else {
            $err .= "Your email is registered ! <br/>";
        }
    }
}
?>
<section id="login">
    <div class="wrap">
        <div class="heading">
            <img src="images/logoShop.png" width="200px">
            <?php global $err;
            if ($err != "") { ?>
                <div class="alert alert-danger">
                    <?= $err ?>
                </div>
            <?php } ?>
        </div>
        <form method="post">
            <div class="form-group">
                <input type="text" required name="email">
                <span>Email</span>
                <i></i>
            </div>
            <div class="form-group">
                <input type="text" required name="username">
                <span>Tài khoản</span>
                <i></i>
            </div>
            <div class="form-group">
                <input type="password" required name="password">
                <span>Mật khẩu</span>
                <i></i>
            </div>
            <div class="form-group">
                <input type="password" required
                    name="rePassword">
                <span>Nhập lại mật khẩu</span>
                <i></i>
            </div>
            <div class="form-group btn">
                <a href="?page=login" class="login">Đăng nhập</a>
                <button class="normal" name="signup">Tạo</button>
            </div>
        </form>
    </div>
</section>