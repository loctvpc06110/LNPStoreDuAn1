<?php
$errIn4 = "";
if (isset($_SESSION['login_email_user'])){
    $email = $_SESSION['login_email_user'];
}
else if(isset($_SESSION['login_email_admin'])){
    $email = $_SESSION['login_email_admin'];
}

$db = new User();
$row_up = $db->getByEmail($email);

if (isset($_POST['saveIn4'])) {
    $username = $_POST['customer_name'];
    $phone = $_POST['customer_phone'];
    $address = $_POST['customer_address'];

    if ($username == "" || $phone == "" || $address == "") {
        $errIn4 .= "Vui lòng điền đủ thông tin";
    }

    if ($errIn4 == "") {
        $saveInfo = $db->updateUser($username, $address, $phone, $row_up['user_id']);
        echo "<script>document.location='?page=infouser';</script>";
    }
}
?>

<?php
$errChangePW = "";
if (isset($_POST["changePW"])) {
    $password = $row_up['password'];
    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    $retypePassword = $_POST["retypePassword"];

    if ($oldPassword == "" || $newPassword == "" || $retypePassword == "") {
        $errChangePW = "Vui lòng nhập đủ thông tin !";
    } else if ($password != md5($oldPassword)) {    
            $errChangePW = "Mật khẩu không chính xác !";
    } else if (strlen($newPassword) < 8) {
        $errChangePW = "Mật khẩu ít nhất 8 kí tự !";
    } else if ($newPassword != $retypePassword) {
        $errChangePW = "Mật khẩu mới không khớp !";
    }

    if ($errChangePW == "") {
        $changePassword = $db->changePassword(md5($newPassword), $row_up['user_id']);
        $errChangePW = "1";
    }
}
?>

<section id="container-in4" class="section-p1">
    <div class="row" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
        <div class="col-7" style="border: 1px solid lightgray; padding: 25px 20px; border-radius: 20px;">
            <h2>Thông Tin</h2>

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên: </label><br>
                    <input type="text" name="customer_name" class="form-control" style="width: 100%;" value="<?php if (isset($row_up['name']))
                        echo $row_up['name']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Email: </label><br>
                    <input type="button" name="customer_email" class="form-control"
                        style="width: 100%; text-align: left;" value="<?php if (isset($row_up['email']))
                            echo $row_up['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại: </label><br>
                    <input type="text" name="customer_phone" class="form-control" style="width: 100%;" value="<?php if (isset($row_up['phone']))
                        echo $row_up['phone']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ: </label><br>
                    <input type="text" name="customer_address" class="form-control" style="width: 100%;" value="<?php if (isset($row_up['address']))
                        echo $row_up['address']; ?>">
                </div>
                <?php
                if ($errIn4 != "") { ?>
                    <div class="alert alert-danger">
                        <?= $errIn4 ?>
                    </div>
                <?php } ?> 
                
                <button class="normal btn-checkout" name="saveIn4">Lưu</button>
                <a href="?login=logout_user" class="w3-bar-item w3-button">Đăng xuất</a>
            </form>

        </div>
        <div class="col-4" style="border: 1px solid lightgray; padding: 25px 20px; border-radius: 20px;">
            <h2>Đổi mật khẩu</h2>
            <form method="post">
                <div class="form-group">
                    <label for="">Nhập mật khẩu cũ</label><br>
                    <input type="text" name="oldPassword" class="form-control" style="width: 100%; text-align: left;">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu mới</label><br>
                    <input type="text" name="newPassword" class="form-control" style="width: 100%; text-align: left;">
                </div>
                <div class="form-group">
                    <label for="">Nhập lại</label><br>
                    <input type="text" name="retypePassword" class="form-control" style="width: 100%; text-align: left;">
                </div>
                <?php
                if ($errChangePW != "" && $errChangePW != "1") { ?>
                    <div class="alert alert-danger">
                        <?= $errChangePW ?>
                    </div>
                <?php } ?>

                <?php
                if ($errChangePW == "1") { ?>
                    <div class="alert alert-success">
                        Bạn đã đổi mật khẩu thành công !
                    </div>
                <?php } ?>
                <button class="normal btn-checkout" name="changePW">Đổi</button>
            </form>
        </div>
    </div>

</section>