<?php
if (isset($_SESSION['login_email_user'])) {
    $email = $_SESSION['login_email_user'];
    echo "<script>document.location='index.php?page=home';</script>";
}else if (isset($_SESSION['login_email_admin'])) {
    $email = $_SESSION['login_email_admin'];
    echo "<script>document.location='index.php?page=home';</script>";
}
$err = "";
if (isset($_POST['sendEmail'])) {
    $db = new User();
    $email = $_POST['email'];
    if ($email == '') {
        $err = "Vui lòng nhập email !";
    } else if ($db->checkAccount($email)) {
        $err = "Email này chưa đăng ký !";
    } else {
        $newPassword = substr(md5(rand(0, 99999)), 0, 8);
        $upPassword = $db->forgotPassword($email, md5($newPassword));

        //Gửi php mailer
        require "PHPMailer-master/src/PHPMailer.php";
        require "PHPMailer-master/src/SMTP.php";
        require 'PHPMailer-master/src/Exception.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug
            $mail->isSMTP();
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'loctvpc06110@gmail.com'; // SMTP username
            $mail->Password = 'aizs gkhv yldi njuy';   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
            $mail->Port = 465;  // port to connect to                
            $mail->setFrom('loctvpc06110@gmail.com', 'LNP Store');
            $mail->addAddress($email);
            $mail->isHTML(true);  // Set email format to HTML   
            $mail->Subject = 'Thư Gửi Mật Khẩu Từ LNP Store';
            $noidungthu = "<p>Từ yêu cầu của bạn chúng tôi xin gửi bạn mật khẩu mới</p>
                Mật khẩu của bạn là: <strong>{$newPassword}</strong>
            ";
            $mail->Body = $noidungthu;
            $mail->smtpConnect(array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            $mail->send();
            // echo 'Đã gửi mail xong';
        } catch (Exception $e) {
            // echo 'Error: ', $mail->ErrorInfo;
        }
        $err = "1";
    }
}
?>
<section id="login">
    <div class="wrap">
        <div class="heading">
            <img src="images/logoShop.png" width="200px">
            <h4>Lấy Lại Mật Khẩu</h4>
        </div>

        <form method="post">

            <div class="form-group">
                <input type="text" name="email" value="<?php if (isset($email)) echo $email ?>">
                <span>Email</span>
                <i></i>
            </div>
            <?php global $err;
            if ($err != "" && $err != 1) { ?>
                <div class="alert alert-danger">
                    <?= $err ?>
                </div>
            <?php } ?>
            <?php
                if ($err == "1") { ?>
                    <div class="alert alert-success">
                        Mật khẩu đã gửi về Email bạn !
                    </div>
                <?php } ?>
            <div class="form-group btn">
                <a href="?page=signup">Tạo tài khoản ?</a>
                <button class="normal" name="sendEmail">Gửi Mail</button>
            </div>

        </form>

    </div>
</section>