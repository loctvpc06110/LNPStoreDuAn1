<section id="product1" class="section-p1">


    <?php
    if (isset($_POST['search'])) {
        $keyS = $_POST['txt_search'];

        if ($keyS == "") {
            echo "<h3>Bạn chưa nhập từ khóa tìm kiếm !!!</h3>";
        } else {
            $db = new Product();
            $count_s = $db->checksearch($keyS);
            $count = (int)$count_s;

            if ($count_s == 0) {
                echo "<h3>Không tìm thấy từ khóa <b style='color: red;'>$keyS</b> mà bạn đã nhập</h3>";
            } else {
                echo "<h3>Từ khóa tìm kiếm của bạn cho kết quả: <b style='color: red;'>$keyS</b></h3>";
    ?>

                <div class="pro-container">

                    <?php
                    $rows = $db->getByKey($keyS);
                    foreach ($rows as $row) { ?>

                        <a href="?page=detail&id=<?php echo $row['prod_id']; ?>">
                            <div class="pro">
                                <img src="images/prod/<?php echo $row['image'] ?>" alt="Image Shirt">
                                <div class="des">
                                    <span>
                                        <?php echo $row['rom'] ?> / <?php echo $row['ram'] ?>
                                    </span>
                                    <h5><?php echo $row['promo_name'] ?></h5>
                                    <h5>
                                        <?php echo $row['prod_name'] ?>
                                    </h5>
                                    <div class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 style="color: rgb(177, 177, 177); text-decoration: line-through;">
                                        <?php echo $db->format_price($row['price']) ?> VNĐ
                                    </h4>
                                    <h4>
                                        <?php echo $db->format_price($row['price'] - $row['price'] * $row['promo_value'] / 100)  ?> VNĐ
                                    </h4>
                                </div>
                                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                            </div>
                        </a>

                    <?php } ?>

                </div>

    <?php
            }
        }
    }
    ?>