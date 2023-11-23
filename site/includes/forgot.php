<section id="login">
    <div class="wrap">
        <div class="heading">
            <img src="images/logoShop.png" width="200px">
            <h4>Lấy Lại Mật Khẩu</h4>
            <?php global $err;
            if ($err != "") { ?>
                <div class="alert alert-danger">
                    <?= $err ?>
                </div>
            <?php } ?>
        </div>

        <form method="post">

            <div class="form-group">
                <input type="text" required name="email" value="<?php if (isset($email))
                    echo $email ?>">
                    <span>Email</span>
                    <i></i>
                </div>

                <div class="form-group btn">
                    <a href="?page=signup">Tạo tài khoản ?</a>
                    <button class="normal" name="sendEmail">Gửi Mail</button>
                </div>

            </form>

        </div>
    </section>