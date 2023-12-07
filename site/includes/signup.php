<?php
$err = "";
if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $password = ($_POST['password']);
    $rePassword = $_POST['rePassword'];

    if ($email == '' || $password == '' || $rePassword == '') {
        $err = "Vui lòng nhập đủ ! <br/>";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = "Email không đúng có pháp ! <br/>";
    }
    else if (strlen($password) < 8) {
        $err = "Mật khẩu ít nhất 8 kí tự !<br/>";
    }
    else if (strpos($password, ' ') !== false) {
        $err = "Không chứa dấu cách !<br/>";
    }
    else if ($password != $rePassword) {
        $err = "Mật khẩu nhập lại ko chính xác ! <br/>";
    }

    if ($err == "") {
        $db = new User();
        if ($db->checkAccount($email)) {
            $newAcc = $db->createAcc($email, md5($password));
            echo "<script>alert('Đăng ký tài khoản thành công');</script>";
            echo "<script>document.location='index.php?page=login';</script>";
        } else {
            $err = "Email này đã đăng ký !<br/>";
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
                <input type="text" name="email">
                <span>Email</span>
                <i></i>
            </div>
            <div class="form-group">
                <input type="password" name="password">
                <span>Mật khẩu</span>
                <i></i>
            </div>
            <div class="form-group">
                <input type="password" name="rePassword">
                <span>Nhập lại mật khẩu</span>
                <i></i>
            </div>
            <?php global $err;
            if ($err != "") { ?>
                <div class="alert alert-danger">
                    <?= $err ?>
                </div>
            <?php } ?>
            <div class="form-group btn">
                <a href="?page=login" class="login">Đăng nhập</a>
                <button class="normal" name="signup">Tạo</button>
            </div>
        </form>
    </div>
</section>