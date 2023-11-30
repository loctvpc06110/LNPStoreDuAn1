<section id="page-header">

</section>
<section id="logo-brand" class="section-p1">

    <?php
    $db = new Categories();
    $rows2 = $db->lishCategories();

    foreach ($rows2 as $row2) { ?>
        <a href="?page=product_dm&id=<?php echo $row2['cate_id'] ?>">
            <img src="images/prod/<?php echo $row2['images'] ?>" alt="Image Shirt" width="60%">
        </a>
    <?php } ?>
</section>

<section id="product1" class="section-p1">
    <h2>Tất Cả Sản Phẩm</h2>
    <p>Sản phẩm công nghệ hiện đại mới nhất</p>
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

<section id="pagination" class="section-p1">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#"><i class="fa-solid fa-arrow-right-long"></i></a>
</section>

<?php include("_newsletter.php"); ?>
<!--End news -->