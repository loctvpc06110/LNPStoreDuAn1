<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = new Product();
    $dbCmt = new Comment();
    $rowViews = $db->updateViews($id);
    $row = $db->getListDetailByID($id);
    $rows_img = $db->getDescImage($id);
}
?>

<section id="prodetails" class="section-p1">

    <div class="single-pro-image">
        <div class="main-img">
            <img src="images/prod/<?= $row['image'] ?>" width="100%" id="mainImg">
        </div>
        <div class="small-img-group">
            <div class="small-img-col">
                <img src="images/prod/<?= $row['image'] ?>" width="100%" height="150px" class="smallImg">
            </div>
            <?php
            foreach ($rows_img as $row_img) {
                echo '<div class="small-img-col">
                <img src="images/prod/' . $row_img["image"] . '" width="100%" height="150px" class="smallImg">
            </div>';
            }
            ?>
        </div>
    </div>
    <div class="single-pro-details">
        <form method="post" action="?page=cart">

            <h6 id="categoryPro">
                <?= $row['cate_name'] ?>
            </h6>
            <h4 id="namePro">
                <?= $row['prod_name'] ?>
            </h4>
            <h2 id="pricePro">
                <?= $db->format_price($row['price']) ?> VNĐ
            </h2>

            <input name="prod_quantity" type="number" value="1">
            <input type="hidden" name="prod_price" value="<?= $row['price'] ?>">
            <input type="hidden" name="prod_id" value="<?= $row['id_prod'] ?>">

            <button type="submit" name="add_cart" class="normal">Thêm Giỏ Hàng</button>
        </form>
        <h4>Thông Số Điện Thoại</h4>
        <span id="describePro">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">Màn hình:</th>
                        <td><?= $row['screen'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Hệ điều hành:</th>
                        <td><?= $row['os'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Camera sau:</th>
                        <td><?= $row['camera'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Camera trước:</th>
                        <td><?= $row['camera_front'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Chip:</th>
                        <td><?= $row['chip'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">RAM:</th>
                        <td><?= $row['ram'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Dung lượng lưu trữ:</th>
                        <td><?= $row['rom'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">SIM:</th>
                        <td><?= $row['sim'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Pin, Sạc:</th>
                        <td><?= $row['battery'] ?></td>
                    </tr>
                </tbody>
            </table>
        </span>


    </div>

</section>


<?php
if (isset($_SESSION['login_email_user'])) {
    $email = $_SESSION['login_email_user'];
    $db_user = new User();
    $row_user = $db_user->getByEmail($email);

    if (isset($_POST['comment'])) {
        $content = $_POST['content'];
        $cmt = $dbCmt->createComment($id, $content, $row_user['user_id']);
        echo "<script>document.location='index.php?page=detail&id=" . $id . "'</script>";
    }
} else if (isset($_SESSION['login_email_admin'])) {
    $email = $_SESSION['login_email_admin'];
    $db_user = new User();
    $row_user = $db_user->getByEmail($email);

    if (isset($_POST['comment'])) {
        $content = $_POST['content'];
        $cmt = $dbCmt->createComment($id, $content, $row_user['user_id']);
        echo "<script>document.location='index.php?page=detail&id=" . $id . "'</script>";
    }
} else {
    if (isset($_POST['comment'])) {
        echo "<script>document.location='index.php?page=login';</script>";
    }
}
?>
<section id="review" class="section-p1">
    <div class="comment">
        <h3>Viết đánh giá</h3>
        <form method="POST" action="">
            <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
            </div>
            <button class="btn btn-primary" name="comment">Gửi</button>
        </form>
    </div>
    <div class="see-comment">
        <h3>Xem bình luận</h3>
        <div class="comment-list">
            <?php
            $rows_cmt = $dbCmt->showCommentByProdID($id);
            foreach ($rows_cmt as $row_cmt) { ?>
                <div class="form-group">
                    <label for="comment">
                        <?php
                        if ($row_cmt['name'] != '') {
                            echo $row_cmt['name'];
                            echo " / ";
                            $lastcmt = $dbCmt->getLastComment($row['id_prod']);
                            $formattedDate = date("Y-m-d", strtotime($lastcmt['lastCmt']));
                            echo $formattedDate;
                        } else {
                            echo $row_cmt['email'];
                            echo " / ";
                            $lastcmt = $dbCmt->getLastComment($row['id_prod']);
                            $formattedDate = date("Y-m-d", strtotime($lastcmt['lastCmt']));
                            echo $formattedDate;
                        }
                        ?>
                    </label>
                    <input class="form-control" type="button" value="<?= $row_cmt['content'] ?>" style="text-align: left;">
                </div>
                <hr />
            <?php } ?>
        </div>
    </div>

</section>


<section id="product1" class="section-p1">

    <h2>Sản Phẩm Tương Tự</h2>
    <p>Bộ sưu tập Thiết kế Morden mới</p>
    <div class="pro-container">
        <?php
        $rows_sml = $db->getSimilar($row['cate_name'], $row['id_prod']);

        foreach ($rows_sml as $row_sml) { ?>
            <a href="?page=detail&id=<?php echo $row_sml['id_prod']; ?>">
                <div class="pro">
                    <img src="images/prod/<?php echo $row_sml['image'] ?>" alt="Image Shirt">
                    <div class="des">

                        <span>
                            <?php echo $row_sml['rom'] ?> / <?php echo $row_sml['ram'] ?>
                        </span>

                        <h5><?php echo $row_sml['prod_name'] ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4><?php echo $db->format_price($row_sml['price']) ?> VNĐ</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </a>
        <?php } ?>

    </div>


    </div>



</section>

<?php include("_newsletter.php"); ?>
<!--End news -->