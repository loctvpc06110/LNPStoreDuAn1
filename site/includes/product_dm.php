<section id="product1" class="section-p1">
    <?php
    $id = $_GET['id'];
    $db = new Categories();
    $rows2 = $db->lishCategoriesName($id);
    ?>
    <h2>Điện Thoại <?= $rows2['cate_name'] ?></h2>

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

    </div>
    <h2>Sản Phẩm Được Gợi Ý</h2>
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