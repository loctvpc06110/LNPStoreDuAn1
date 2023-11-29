<section id="hero">

</section>
<!--End Hero -->

<?php include('_feature.php'); ?>
<!--End Feature -->

<section id="product1" class="section-p1">

    <h2>Sản Phẩm Mới Nhất</h2>
    <p>Bộ sưu tập Thiết kế hiện đại mới</p>

    <div class="pro-container">

        <?php
        $db = new Product();
        $rows2 = $db->getListDetail();

        foreach ($rows1 as $row1) { ?>

            <a href="?page=detail&id=<?php echo $row1['prod_id']; ?>">
                <div class="pro">
                    <img src="images/prod/<?php echo $row1['image'] ?>" alt="Image Shirt">
                    <div class="des">
                        <span>
                            <?php echo $row1['rom'] ?> / <?php echo $row1['ram'] ?>
                        </span>
                        <h5>
                            <?php echo $row1['name'] ?>
                        </h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>
                            <?php echo $row1['price'] ?> VNĐ
                        </h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </a>

        <?php } ?>

    </div>

</section>
<!--End Featured Product -->

<section id="banner" class="section-m1">
    <div class="image-slider">
        <div class="image-item" id="data_depute">
            <div class="image">
                <img src="images/bg/slider01.jpg" alt="">
            </div>

        </div>
        <div class="image-item">
            <div class="image">
                <img src="images/bg/slider02.jpg" alt="">
            </div>

        </div>
        <div class="image-item">
            <div class="image">
                <img src="images/bg/slider03.jpg" alt="">
            </div>

        </div>
        <div class="image-item">
            <div class="image">
                <img src="images/bg/slider04.jpg" alt="">
            </div>

        </div>
    </div>
</section>
<!-- End Banner primary -->

<section id="product1" class="section-p1">

    <h2>Sản Phẩm Khuyến Mãi</h2>
    <p>Những Sản Phẩm Hiện Đang Được Khuyến Mãi Nhiều Nhất</p>

    <div class="pro-container">

        <?php
        $db = new Product();
        $rows1 = $db->getListDetail();

        foreach ($rows1 as $row1) { ?>

            <a href="?page=detail&id=<?php echo $row1['prod_id']; ?>">
                <div class="pro">
                    <img src="images/prod/<?php echo $row1['image'] ?>" alt="Image Shirt">
                    <div class="des">
                        <span>
                            <?php echo $row1['rom'] ?> / <?php echo $row1['ram'] ?>
                        </span>
                        <h5>
                            <?php echo $row1['name'] ?>
                        </h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>
                            <?php echo $row1['price'] ?> VNĐ
                        </h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </a>

        <?php } ?>

    </div>

</section>
<!-- End Product New Arrivals -->

<section id="sm-banner" class="section-p1">
    <div class="banner-box">
        <h4>Ưu đãi LNP Store</h4>
        <h2>1 Đổi 1</h2>
        <span>1 Đổi 1 trong vòng 7 ngày !</span>
        <a href="?page=shop"><button class="white">Xem ngay</button></a>
    </div>
    <div class="banner-box banner-box2">
        <h4>Khuyễn mãi cuối tháng</h4>
        <h2>Big Sale</h2>
        <span>Giảm giá 5-30% các sản phẩm tại LNP Store</span>
        <a href="?page=shop"><button class="white">Xem ngay</button></a>
    </div>
</section>

<section id="banner3">
    <div class="banner-box">

    </div>
    <div class="banner-box banner-box2">

    </div>
    <div class="banner-box banner-box3">

    </div>
</section>
<!-- End Banner scondary -->

<?php include("_newsletter.php"); ?>
<!--End news -->