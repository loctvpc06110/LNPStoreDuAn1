<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $db = new Product();
        $row = $db->getListDetailByID($id);
    }
?>
<section id="prodetails" class="section-p1">

    <div class="single-pro-image">
        <div class="main-img">
            <img src="images/prod/<?= $row['image']?>" width="100%" id="mainImg">
        </div>
        <div class="small-img-group">
            <div class="small-img-col">
                <img src="images/prod/prod01.jpg" width="100%" height="150px" class="smallImg">
            </div>
            <div class="small-img-col">
                <img src="images/prod/detail_prod01_1.jpg" width="100%" height="150px" class="smallImg">
            </div>
            <div class="small-img-col">
                <img src="images/prod/detail_prod01_2.jpg" width="100%" height="150px" class="smallImg">
            </div>
            <div class="small-img-col">
                <img src="images/prod/detail_prod01_3.jpg" width="100%" height="150px" class="smallImg">
            </div>
        </div>
    </div>
    <div class="single-pro-details">
        <form method="post" action="?page=cart">

            <h6 id="categoryPro">
                <?= $row['cate_name']?>
            </h6>
            <h4 id="namePro">
                <?= $row['cate_name']?>
            </h4>
            <h2 id="pricePro">
                22.000.000 vnđ
            </h2>

            <input name="quantity_cart" type="number" value="1">
            <button type="submit" name="add_cart" class="normal">Add To Cart</button>
            <h4>Product Details</h4>
            <span id="describePro">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Màn hình:</th>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">Hệ điều hành:</th>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Camera sau:</th>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">Camera trước:</th>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">Chip:</th>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">RAM:</th>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">Dung lượng lưu trữ:</th>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">SIM:</th>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">Pin, Sạc:</th>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </span>

        </form>
    </div>

</section>

<section id="review" class="section-p1">
    <div class="comment">
        <h3>Viết đánh giá</h3>
        <form method="POST" action="">
            <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
            </div>
            <button class="btn btn-primary" name="comment">Submit</button>
        </form>
    </div>
    <div class="see-comment">
        <h3>Xem bình luận</h3>
        <div class="comment-list">
           
                <div class="form-group">
                    <label for="comment">Comment cre: 
                    </label>
                    <input class="form-control" type="button" value="">
                </div>
                <hr />
           
        </div>
    </div>

</section>


<section id="product1" class="section-p1">

    <h2>Sản Phẩm Tương Tự</h2>
    <p>Bộ sưu tập Thiết kế Morden mới</p>

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

<?php include("_newsletter.php"); ?>
<!--End news -->

