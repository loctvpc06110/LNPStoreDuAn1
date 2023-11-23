<?php
$errIn4 = "";
$email = $_SESSION['login_email_user'];
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
        echo "<script>document.location='?page=info';</script>";
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

    if ($password != $oldPassword) {
        $errChangePW = "Mật khẩu không chính xác !";
    } else if ($oldPassword == "" || $newPassword == "" || $retypePassword == "") {
        $errChangePW .= "Vui lòng nhập đủ thông tin !";
    } else if (strlen($newPassword) < 8) {
        $errChangePW .= "Mật khẩu ít nhất 8 kí tự !";
    } else if ($newPassword != $retypePassword) {
        $errChangePW .= "Mật khẩu mới không khớp !";
    }

    if ($errChangePW == "") {
        $changePassword = $db->changePassword($newPassword, $row_up['user_id']);
    }
}
?>

<section id="container-in4" class="section-p1">
    <div class="row">
        <div class="col-6" style="border: 1px solid lightgray; padding: 25px 20px;">
            <h2>Your Information</h2>

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name: </label><br>
                    <input type="text" name="customer_name" class="form-control" style="width: 100%;" value="<?php if (isset($row_up['username']))
                        echo $row_up['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Email: </label><br>
                    <input type="button" name="customer_email" class="form-control"
                        style="width: 100%; text-align: left;" value="<?php if (isset($row_up['email']))
                            echo $row_up['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Phone: </label><br>
                    <input type="text" name="customer_phone" class="form-control" style="width: 100%;" value="<?php if (isset($row_up['phone']))
                        echo $row_up['phone']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Address: </label><br>
                    <input type="text" name="customer_address" class="form-control" style="width: 100%;" value="<?php if (isset($row_up['address']))
                        echo $row_up['address']; ?>">
                </div>
                <?php
                if ($errIn4 != "") { ?>
                    <div class="alert alert-danger">
                        <?= $errIn4 ?>
                    </div>
                <?php } ?>
                <button class="normal btn-checkout" name="saveIn4">Save</button>
                <a href="?login=logout_user" class="w3-bar-item w3-button">Log out</a>
            </form>

        </div>
        <div class="col-5" style="border: 1px solid lightgray; padding: 25px 20px; margin-left: 40px;">
            <h2>Change Password</h2>
            <form method="post">
                <div class="form-group">
                    <label for="">Old Password</label><br>
                    <input type="text" name="oldPassword" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">New Password</label><br>
                    <input type="text" name="newPassword" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Retype Password</label><br>
                    <input type="text" name="retypePassword" class="form-control">
                </div>
                <?php
                if ($errChangePW != "") { ?>
                    <div class="alert alert-danger">
                        <?= $errChangePW ?>
                    </div>
                <?php } ?>
                <button class="normal btn-checkout" name="changePW">Change</button>
            </form>
        </div>
    </div>


</section>